<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use App\Http\Requests\DishUpdateRequest;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Orders;
use App\Models\SubCategory;
use App\Services\DishService;
use App\Services\GeneralService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OrdersController extends Controller
{
    public $orderService;
    public $generalService;

    public function __construct(OrderService $orderService, GeneralService $generalService)
    {
        $this->orderService = $orderService;
        $this->generalService = $generalService;
    }

    public function index()
    {
        return view('backend.orders.index');
    }

    public function fetch(Request $request)
    {
        $columns = ['id', 'user_id', 'total_amount', 'payment_mode', 'payment_status', 'order_status', 'created_at'];
        $response = $this->orderService->fetch($request->all(), $columns);
        $data = [];

        foreach ($response['data'] as $value) {
            $data[] = [
                'id' => $value->id,
                'user_name' => Crypt::decryptString($value->userDetail->firstname) . ' ' . Crypt::decryptString($value->userDetail->lastname) ?? 'N/A', // If user name is included
                'total_amount' => $value->total_amount ?? '',
                'payment_mode' => $value->payment_mode ?? '',
                'payment_status' => ucfirst($value->payment_status) ?? '',
                'order_status' => config('enum.order_status')[$value->order_status],
                // 'order_status' => ($value->order_status == '0') ? 'Order Placed' : '',
                'created_at' => $value->created_at->format('Y-m-d H:i:s'),
                'action' => '<div class="flex">'
                    . viewBtn(route('orders.edit', $value->id)),
            ];
        }
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $response['total'],
            'recordsFiltered' => $response['total'],
            'data' => $data,
        ]);
    }

    public function create()
    {
        $categoryList = $this->generalService->getCategoryList();
        return view('backend.orders.create', compact('categoryList'));
    }

    public function store(SubCategoryRequest $request)
    {
        $this->orderService->store($request->all());
        return redirect()->route('subCategory.index')->with('success', 'Saved successfully!');
    }

    public function edit(Orders $orders)
    {
        return view('backend.orders.edit', compact('orders'));
    }

    public function update(SubCategoryUpdateRequest $request, SubCategory $subCategory)
    {
        $this->orderService->update($subCategory, $request->all());
        return redirect()->route('subCategory.index')->with('success', 'Saved successfully!');
    }

    public function destroy(SubCategory $subCategory)
    {
        $this->orderService->delete($subCategory);
        return redirect()->route('subCategory.index')->with('success', 'Deleted successfully!');
    }
    public function getCountryName(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        if (empty($category)) {
            return '';
        }
        $countryName = Country::where('id', $category->country_id)->first();
        if (empty($countryName)) {
            return '';
        }
        return ucfirst($countryName->name) ?? '';
    }
    public function updateStatus(Request $request,Orders $orders)
    {
        $request->validate([
            'status' => 'required'
        ]);
        $orders->order_status = $request->status;
        if($request->status == '5'){
            $orders->delivered_at = now();

        }
        $orders->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}
