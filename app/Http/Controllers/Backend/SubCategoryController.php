<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use App\Http\Requests\DishUpdateRequest;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use App\Services\DishService;
use App\Services\GeneralService;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SubCategoryController extends Controller
{
    public $subCategoryService;
    public $generalService;

    public function __construct(SubCategoryService $subCategoryService, GeneralService $generalService)
    {
        $this->subCategoryService = $subCategoryService;
        $this->generalService = $generalService;
    }

    public function index()
    {
        return view('backend.subCategory.index');
    }

    public function fetch(Request $request)
    {
        $columns = ['id', 'title','category_id', 'status'];
        $response = $this->subCategoryService->fetch($request->all(),$columns);
        $data = [];
        foreach ($response['data'] as $value) {
            $data[] = [
                'id' => $value->id,
                'category_name' => Crypt::decryptString($value->categoryDetail->title) ?? '',
                'title' => Crypt::decryptString($value->title) ?? '',
                'status' => $value->status == '0' ? 'Active' : 'In Active' ,
                'actions' => '<div class="flex">' . editBtn(route('subCategory.edit', $value->id)) . ' ' . deleteBtn(route('subCategory.destroy', $value->id)) . '</div>',
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
        return view('backend.subCategory.create',compact('categoryList'));
    }

    public function store(SubCategoryRequest $request)
    {
        $this->subCategoryService->store($request->all());
        return redirect()->route('subCategory.index')->with('success', 'Saved successfully!');
    }

    public function edit(SubCategory $subCategory)
    {
        $categoryList = $this->generalService->getCategoryList();
        return view('backend.subCategory.edit', compact('subCategory','categoryList'));
    }

    public function update(SubCategoryUpdateRequest $request, SubCategory $subCategory)
    {
        $this->subCategoryService->update($subCategory, $request->all());
        return redirect()->route('subCategory.index')->with('success', 'Saved successfully!');
    }

    public function destroy(SubCategory $subCategory)
    {
        $this->subCategoryService->delete($subCategory);
        return redirect()->route('subCategory.index')->with('success', 'Deleted successfully!');
    }
    public function getCountryName(Request $request){
        $category = Category::where('id',$request->id)->first();
        if(empty($category)){
            return '';
        }
        $countryName = Country::where('id',$category->country_id)->first();
        if(empty($countryName)){
            return '';
        }
        return ucfirst($countryName->name) ?? '';
    }
}

