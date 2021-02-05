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

    // Restful api 404 -> NOT Found
    public function countryByID($id)
    {
        $country = countryModel::find($id);
        if (is_null($country)) {
            return response()->json('Record Not found', 404);
        } else {
            return response()->json($country, 200);
        }
    }

    //Restful api 201 -> Created
    public function countrySave(Request $request)
    {
        $country = countryModel::create($request->all());
        return response()->json($country, 201);
    }

    // Restful api 200 -> OK
    public function countryUpdate(Request $request, $id)
    {
        $country = countryModel::find($id);
        if (is_null($country)) {
            return response()->json('Record Not found', 404);
        } else {
            $country->update($request->all());
            return response()->json($country, 200);
        }
    }

    // Restful api 204 -> Return No Content
    public function countryDelete(Request $request, $id)
    {
        $country = countryModel::find($id);
        if (is_null($country)) {
            return response()->json('Record Not found', 404);
        } else {
            $country->delete();
            return response()->json(null, 204);
        }
    }
}