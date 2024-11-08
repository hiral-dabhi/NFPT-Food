<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\RestaurantMaster;
use Darryldecode\Cart\Facades\CartFacade as Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function index(Request $request){  
        $category = Category::find($request->category_id);
        $restaurants = RestaurantMaster::when($category, function ($query) use ($request) {
            $query->whereHas('menus', function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            });
        })->get();
        return view('front.business-list',compact('restaurants','category'));
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
