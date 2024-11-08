<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\RestaurantMaster;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function viewCart(){
        return view('front.cart');
    }

    public function checkout(RestaurantMaster $business, Request $request)
    {
        $user = Auth::guard('customer')->user();
        $cartItems = Cart::session($user->id)->getContent();
        $totalAmount = Cart::session($user->id)->getTotal();
        DB::beginTransaction();
        try {
            $order = Orders::create([
                'user_id' => $user->id,
                'restaurant_id' => $business->id,
                'total_amount' => $totalAmount,
                'payment_mode' => $request->payment_mode,
                'payment_status' => '0',
                'order_status' => '0',
                'extra_instructions' => $request->extra_instructions,
                'order_status' => 'placed'
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'dish_id' => $item->id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
            }
            DB::commit();
            Cart::session($user->id)->clear();
            return redirect()->route('front.home')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'There was an issue placing your order. Please try again.');
        }
    }
    public function updateCart(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->input('id');
        $quantity = $request->input('quantity');
        
        $user = Auth::guard('customer')->user();
        $cart = Cart::session($user->id)->get($productId);

        if ($cart) {
            Cart::session($user->id)->update($productId, [
                'quantity' => $quantity,
            ]);
            $totalAmount = Cart::getTotal();

            return response()->json([
                'status' => 'success',
                'message' => 'Cart updated successfully.',
                'total' => $totalAmount,
            ]);
            return response()->json(['success' => true, 'message' => 'Cart updated successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Item not found in cart.'], 404);
    }

    public function orderSuccess(){
        return view('front.order-success');
    }
}
