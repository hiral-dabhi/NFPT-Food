<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use App\Services\GeneralService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public $categoryService;
    public $generalService;

    public function __construct(CategoryService $categoryService, GeneralService $generalService)
    {
        $this->categoryService = $categoryService;
        $this->generalService = $generalService;
    }

    public function index()
    {
        return view('backend.category.index');
    }

    public function fetch(Request $request)
    {
        $columns = ['id', 'title','country_id', 'status'];
        $response = $this->categoryService->fetch($request->all(),$columns);
        $data = [];
        foreach ($response['data'] as $value) {
            if(!empty($value->countryDetail)){
                $data[] = [
                    'id' => $value->id,
                    'country_name' => $value->countryDetail->name ?? '',
                    'title' => Crypt::decryptString($value->title) ?? '',
                    'status' => $value->status == '1' ? 'Active' : 'In Active' ,
                    'actions' => '<div class="flex">' . editBtn(route('category.edit', $value->id)) . ' ' . deleteBtn(route('category.destroy', $value->id)) . '</div>',
                ];
            }
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
        $countryList = $this->generalService->getCountryList();
        return view('backend.category.create',compact('countryList'));
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryService->store($request->all());
        return redirect()->route('category.index')->with('success', 'Saved successfully!');
    }

    public function edit(Category $category)
    {
        $countryList = $this->generalService->getCountryList();
        return view('backend.category.edit', compact('category','countryList'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $this->categoryService->update($category, $request->all());
        return redirect()->route('category.index')->with('success', 'Saved successfully!');
    }

    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);
        return redirect()->route('category.index')->with('success', 'Deleted successfully!');
    }
}

