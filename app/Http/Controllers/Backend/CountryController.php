<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Http\Requests\SubAdminRequest;
use App\Http\Requests\SubAdminUpdateRequest;
use App\Models\Country;
use App\Models\User;
use App\Services\CountryService;
use App\Services\GeneralService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public $countryService;
    public $generalService;

    public function __construct(CountryService $countryService, GeneralService $generalService)
    {
        $this->countryService = $countryService;
        $this->generalService = $generalService;
    }

    public function index()
    {
        return view('backend.country.index');
    }

    public function fetch(Request $request)
    {
        $columns = ['id', 'name', 'status'];
        $response = $this->countryService->fetch($request->all(),$columns);
        $data = [];
        foreach ($response['data'] as $value) {
            $data[] = [
                'id' => $value->id,
                'name' => $value->name ?? '',
                'actions' => '<div class="flex">' . editBtn(route('country.edit', $value->id)) . ' ' . deleteBtn(route('country.destroy', $value->id)) . '</div>',
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
        return view('backend.country.create');
    }

    public function store(CountryRequest $request)
    {
        $this->countryService->store($request->all());
        return redirect()->route('country.index')->with('success', 'Saved successfully!');
    }

    public function edit(Country $country)
    {
        return view('backend.country.edit', compact('country'));
    }

    public function update(CountryUpdateRequest $request, Country $country)
    {
        $this->countryService->update($country, $request->all());
        return redirect()->route('country.index')->with('success', 'Saved successfully!');
    }

    public function destroy(Country $country)
    {
        $this->countryService->delete($country);
        return redirect()->route('country.index')->with('success', 'Deleted successfully!');
    }
}

