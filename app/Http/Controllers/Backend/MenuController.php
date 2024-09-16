<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use App\Http\Requests\DishUpdateRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use App\Models\Menu;
use App\Services\MenuService;
use App\Services\GeneralService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MenuController extends Controller
{
    public $menuService;
    public $generalService;

    public function __construct(MenuService $menuService, GeneralService $generalService)
    {
        $this->menuService = $menuService;
        $this->generalService = $generalService;
    }

    public function index()
    {
        return view('backend.menu.index');
    }

    public function fetch(Request $request)
    {
        $columns = ['id', 'title','category_id','sub_category_id', 'status','price','type'];
        $response = $this->menuService->fetch($request->all(),$columns);
        $data = [];
        foreach ($response['data'] as $value) {
          
            $data[] = [
                'id' => $value->id,
                'category_name' => Crypt::decryptString($value->categoryDetail->title) ?? '',
                'sub_category' => Crypt::decryptString($value->subCategoryDetail->title) ?? '',
                'title' => $value->title ?? '',
                'price' => $value->price ?? '',
                'type' => $value->type == '0' ? 'Veg' : 'Non Veg' ,
                'status' => $value->status == '0' ? 'Active' : 'In Active' ,
                'actions' => '<div class="flex">' . editBtn(route('menu.edit', $value->id)) . ' ' . deleteBtn(route('menu.destroy', $value->id)) . '</div>',
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
        return view('backend.menu.create',compact('categoryList'));
    }

    public function store(Request $request)
    {
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $fileName = time() . '-' . $file->getClientOriginalName();
        
        //     $file->storeAs('menu', $fileName);        
        // }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = public_path('/menu');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
        }
        $this->menuService->store($request->all(),$fileName);
        return redirect()->route('menu.index')->with('success', 'Saved successfully!');
    }

    public function edit(Menu $menu)
    {
        $categoryList = $this->generalService->getCategoryList();
        return view('backend.menu.edit', compact('menu','categoryList'));
    }

    public function update(Request $request, Menu $menu)
    {
        $fileName = $menu->image ?? ''; 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = public_path('/menu');
            $fileName = $menu->id . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
        }
        $this->menuService->update($menu, $request->all(),$fileName);
        return redirect()->route('menu.index')->with('success', 'Saved successfully!');
    }

    public function destroy(Menu $menu)
    {
        $this->menuService->delete($menu);
        return redirect()->route('menu.index')->with('success', 'Deleted successfully!');
    }
    public function getSubCategory(Request $request) {    
        $dishes = SubCategory::where('category_id', $request->id)->pluck('title', 'id')->toArray();        
        $decryptedDishes = [];
        foreach ($dishes as $id => $title) {
            try {
                $decryptedDishes[$id] = Crypt::decryptString($title);
            } catch (\Exception $e) {
                $decryptedDishes[$id] = 'Decryption failed';
            }
        }    
        return $decryptedDishes;
    }
}

