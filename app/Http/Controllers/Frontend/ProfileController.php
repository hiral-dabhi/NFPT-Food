<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Orders;
use App\Models\RestaurantMaster;
use Darryldecode\Cart\Facades\CartFacade as Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request){  
        $user = Auth::guard('customer')->user();
        $order = Orders::where('user_id',$user->id)->with('itemDetail')->get();
        return view('front.profile');
    }

    public function businessDetail(RestaurantMaster $business){
        $category = Category::whereHas('items', function ($query) use($business) {
            $query->where('restaurant_id', $business->id);
        })->get();
        $menus = Menu::where('restaurant_id',$business->id)->with('subCategoryDetail')->get();
        $cartItems = null;
      
        if (Auth::guard('customer')->check()) {
            $cartItems = Cart::session(Auth::guard('customer')->id())->getContent();
        }
        return view('front.business-detail',compact('business','menus','category','cartItems'));
    }
}
