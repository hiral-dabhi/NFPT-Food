<?php

namespace App\Livewire\Front;

use App\Models\Category;
use App\Models\Menu;
use App\Models\RestaurantMaster;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class BusinessDetail extends Component
{
    public $business;
    public $menus;
    public $category;
    public $cartItems;
    public $totalAmount = 0;
    public $search;

    public function mount(RestaurantMaster $business)
    {

        $this->business = $business;
        if (Auth::guard('customer')->check()) {
            $user = Auth::guard('customer')->user();
            $this->cartItems = CartFacade::session($user->id)->getContent();
            $this->calculateTotal();
        } else {
            $this->cartItems = null;
        }
    }
    protected function loadMenus()
    {
        $this->menus = Menu::where('restaurant_id', $this->business->id)
            ->with('subCategoryDetail')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    protected function loadCategories()
    {
        $this->category = Category::whereHas('items', function ($query) {
            $query->where('restaurant_id', $this->business->id);
        })->when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        })->get();
    }
    public function addToCart($menuId, $title, $price, $businessId)
    {
        if (Auth::guard('customer')->check()) {
            $user = Auth::guard('customer')->user();

            $cartItems = CartFacade::session($user->id)->getContent();


            if ($cartItems->isNotEmpty()) {
                foreach ($cartItems as $item) {
                    if ($item->attributes['business_id'] !== $businessId) {
                        CartFacade::session($user->id)->remove($item->id);
                    }
                }
            }

            CartFacade::session($user->id)->add([
                'id' => $menuId,
                'name' => $title,
                'price' => $price,
                'quantity' => 1,
                'attributes' => [
                    'business_id' => $businessId,
                ],
            ]);
            $this->cartItems = CartFacade::session($user->id)->getContent();
            $this->calculateTotal();
        }
    }

    public function incrementQuantity($itemId)
    {
        $user = Auth::guard('customer')->user();

        CartFacade::session($user->id)->update($itemId, [
            'quantity' => 1
        ]);

        $this->cartItems = CartFacade::session($user->id)->getContent();
        $this->calculateTotal();
    }

    public function decrementQuantity($itemId)
    {
        $user = Auth::guard('customer')->user();

        $item = CartFacade::session($user->id)->get($itemId);

        if ($item->quantity > 1) {
            CartFacade::session($user->id)->update($itemId, [
                'quantity' => -1
            ]);
        } else {
            CartFacade::session($user->id)->remove($itemId);
        }

        $this->cartItems = CartFacade::session($user->id)->getContent();
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $user = Auth::guard('customer')->user();

        $this->totalAmount = CartFacade::session($user->id)->getTotal();
    }

    public function render()
    {
        $this->menus = Menu::where('restaurant_id', $this->business->id)
            ->with('subCategoryDetail')
            ->get();

        $this->category = Category::whereHas('items', function ($query) {
            $query->where('restaurant_id', $this->business->id);
        })
            ->with(['items' => function ($query) {
                $query->where('restaurant_id', $this->business->id);
            }])
            ->get();

        if ($this->search) {
            $this->menus = $this->menus->filter(function ($menu) {
                return strpos(Crypt::decryptString($menu->title), $this->search) !== false;
            });
            $this->category = $this->category->filter(function ($category) {
                return strpos(Crypt::decryptString($category->title), $this->search) !== false;
            });
        }

        return view('livewire.front.business-detail', [
            'business' => $this->business,
            'menus' => $this->menus,
            'category' => $this->category,
            'cartItems' => $this->cartItems,
            'totalAmount' => $this->totalAmount,
        ]);
    }
}
