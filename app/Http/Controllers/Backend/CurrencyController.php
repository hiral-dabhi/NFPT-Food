<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Http\Requests\CurrencyUpdateRequest;
use App\Http\Requests\SubAdminRequest;
use App\Http\Requests\SubAdminUpdateRequest;
use App\Models\Country;
use App\Models\Currency;
use App\Models\User;
use App\Services\CurrencyService;
use App\Services\GeneralService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public $currencyService;
    public $generalService;

    public function __construct(CurrencyService $currencyService, GeneralService $generalService)
    {
        $this->currencyService = $currencyService;
        $this->generalService = $generalService;
    }

    public function index()
    {
        return view('backend.currency.index');
    }

    public function fetch(Request $request)
    {
        $columns = ['id', 'title', 'country_id', 'sign', 'status'];
        $response = $this->currencyService->fetch($request->all(), $columns);
        $data = [];
        foreach ($response['data'] as $value) {
            $data[] = [
                'id' => $value->id,
                'country_name' => $value->countryName->name ?? '',
                'title' => $value->title ?? '',
                'sign' => $value->sign ?? '',
                'actions' => '<div class="flex">' . editBtn(route('currency.edit', $value->id)) . ' ' . deleteBtn(route('currency.destroy', $value->id)) . '</div>',
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
        $countryList = $this->generalService->getCountryList();
        return view('backend.currency.create', compact('countryList'));
    }

    public function store(CurrencyRequest $request)
    {
        if ($request->hasFile('sign_image')) {
            $file = $request->file('sign_image');
            $destinationPath = public_path('/currency');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
        }
        $this->currencyService->store($request->all(), $fileName);
        return redirect()->route('currency.index')->with('success', 'Saved successfully!');
    }

    public function edit(Currency $currency)
    {
        $countryList = $this->generalService->getCountryList();
        return view('backend.currency.edit', compact('currency', 'countryList'));
    }

    public function update(CurrencyUpdateRequest $request, Currency $currency)
    {
        $fileName = $currency->image ?? '';
        if ($request->hasFile('sign_image')) {
            $file = $request->file('sign_image');
            $destinationPath = public_path('/currency');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
        }
        $this->currencyService->update($currency, $request->all(), $fileName);
        return redirect()->route('currency.index')->with('success', 'Saved successfully!');
    }

    public function destroy(currency $currency)
    {
        $this->currencyService->delete($currency);
        return redirect()->route('currency.index')->with('success', 'Deleted successfully!');
    }
}
