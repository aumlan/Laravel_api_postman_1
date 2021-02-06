<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\countryModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
//use Validator;

class countryController extends Controller
{
    /*
    //*TODO NOT NEEDED in Controller Resource method  

    public function country()
    {
        return response()->json(countryModel::get(), 200);
    }
    // Restful api 404 -> NOT Found
    public function countryByID($id)
    {
        $country = countryModel::find($id);
        if (is_null($country)) {
            return response()->json(["message" => 'Record Not found'], 404);
        } else {
            return response()->json($country, 200);
        }
    }
    //Restful api 201 -> Created
    public function countrySave(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'iso' => 'required|min:2|max:2'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            try {
                $country = countryModel::create($request->all());
                return response()->json($country, 201);
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == 1062) {
                    return response()->json(["message" => $e->errorInfo[2]], 400); //$e->errorInfo[2] = specific duplicate index and value
                }
            }
        }
    }
    // Restful api 200 -> OK
    public function countryUpdate(Request $request, $id)
    {
        $country = countryModel::find($id);
        if (is_null($country)) {
            return response()->json(["message" => 'Record Not found'], 404);
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
            return response()->json(["message" => 'Record Not found'], 404);
        } else {
            $country->delete();
            return response()->json(null, 204);
        }
    }*/
}