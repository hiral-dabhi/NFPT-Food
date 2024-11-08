<?php

namespace App\Livewire\Front;

use App\Models\OrderItem;
use App\Models\Orders;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $cartItems;
    public $totalAmount = 0;
    public $address_1; // Add this property
    public $address_2; // Add this property
    public $contact_person_name; // Add this property
    public $contact_number; // Add this property
    public $packingFee = 0;
    public $partnerTip = 0;
    public $deliveryFee = 0;
    public $discount = 0;
    public $isLoading = false;

    public function mount()
    {
        if (Auth::guard('customer')->check()) {
            $this->cartItems = CartFacade::session(Auth::guard('customer')->id())->getContent();
            $this->calculateTotal();  // Calculate total when mounting
        } else {
            $this->cartItems = null;
        }
    }

    public function incrementQuantity($itemId)
    {
        CartFacade::session(Auth::guard('customer')->id())->update($itemId, [
            'quantity' => 1  // Increment the quantity by 1
        ]);

        $this->cartItems = CartFacade::session(Auth::guard('customer')->id())->getContent();
        $this->calculateTotal();  // Recalculate total after incrementing quantity
    }

    public function decrementQuantity($itemId)
    {
        $item = CartFacade::session(Auth::guard('customer')->id())->get($itemId);

        if ($item->quantity > 1) {
            CartFacade::session(Auth::guard('customer')->id())->update($itemId, [
                'quantity' => -1  // Decrement the quantity by 1
            ]);
        } else {
            CartFacade::session(Auth::guard('customer')->id())->remove($itemId);  // Remove item if quantity is 0
        }

        $this->cartItems = CartFacade::session(Auth::guard('customer')->id())->getContent();
        $this->calculateTotal();  // Recalculate total after decrementing or removing
    }

    public function removeItem($itemId)
    {
        CartFacade::session(Auth::guard('customer')->id())->remove($itemId);  // Remove the item from the cart

        $this->cartItems = CartFacade::session(Auth::guard('customer')->id())->getContent();
        $this->calculateTotal();  // Recalculate total after removing item
    }

    public function calculateTotal()
    {
        $this->totalAmount = CartFacade::session(Auth::guard('customer')->id())->getTotal();
    }

    public function placeOrder()
    {
        $this->isLoading = true;
        $user = Auth::guard('customer')->user();
        $data = $this->validate([
            'address_1' => 'nullable|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'contact_person_name' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:15',
        ]);
        $this->cartItems = CartFacade::session(Auth::guard('customer')->id())->getContent();
        $firstItem = $this->cartItems->first();
        $businessId = $firstItem ? $firstItem->attributes->business_id : null;
        $order = Orders::create([
            'user_id' => $user->id,
            'restaurant_id' => $businessId,
            'total_amount' => $this->totalAmount,
            'payment_mode' => 'Online',
            'payment_status' => 'Pending',
            'extra_instructions' => null,
            'order_status' => '0',
            'address_1' => $data['address_1'] ?? ($user->address ?? ''),
            'address_2' => $data['address_2'] ??  trim(
                ($user->city ?? '') . ', ' .
                    ($user->state ?? '') . ', ' .
                    ($user->country ?? '') . ', ' .
                    ($user->zipcode ?? '')
            ),
            'contact_person_name' => $data['contact_person_name'],
            'contact_number' => $data['contact_number'],
        ]);

        foreach ($this->cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'dish_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price
            ]);
        }

        CartFacade::session($user->id)->clear();
        session()->flash('success', 'Order placed successfully!');
        $this->isLoading = false;
        return redirect()->route('order.success');
    }


    public function render()
    {
        return view('livewire.front.cart', [
            'cartItems' => $this->cartItems,
            'totalAmount' => $this->totalAmount,
            'invoiceTotal' => $this->calculateInvoiceTotal(),
        ]);
    }
    public function calculateInvoiceTotal()
    {
        $itemTotal = $this->totalAmount;
        $invoiceTotal = $itemTotal + $this->packingFee + $this->partnerTip + $this->deliveryFee - $this->discount;
        return $invoiceTotal > 0 ? $invoiceTotal : 0;
    }
}
