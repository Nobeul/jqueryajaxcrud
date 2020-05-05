<?php

namespace App\Http\Controllers;

use App\Country;
use App\Currency;
use App\Language;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $data['companies'] = Company::with('country', 'language', 'currency')->get();
        $data['countries'] = Country::all();
        $data['currencies'] = Currency::all();
        $data['languages'] = Language::all();

        return view('companySettings.viewCompanySettings', $data);
    }

    public function saveSettings(Request $request)
    {
        // dd($request->all());

        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->site_short_name = $request->site_short_name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->tax_id = $request->tax_id;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->street = $request->street;
        $company->zip_code = $request->zip_code;
        $company->country_id = $request->country_name;
        $company->currency_id = $request->currency_name;
        $company->language_id = $request->language_name;
        if ($request->logo) {
            $imageName = time() . '.' . $request->logo->extension();
            $company->logo = $request->logo->move(public_path('images'), $imageName);
            $company->logo = $imageName;
        }
        if ($request->favicon) {
            $imageName = time() . '.' . $request->favicon->extension();
            $company->favicon = $request->favicon->move(public_path('images'), $imageName);
            $company->favicon = $imageName;
        }
        $company->update();
        return back();
    }
}
