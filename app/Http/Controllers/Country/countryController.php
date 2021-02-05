<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\countryModel;

class countryController extends Controller
{
    public function country()
    {
        return response()->json(countryModel::get(), 200);
    }
    public function countryByID($id)
    {
        return response()->json(countryModel::find($id), 200);
    }
    public function countrySave(Request $request)
    {
        $country = countryModel::create($request->all());
        return response()->json($country, 201);
    }
    public function countryUpdate(Request $request, CountryModel $country)
    {
        $country->update($request->all());
        return response()->json($country, 200);
    }
}