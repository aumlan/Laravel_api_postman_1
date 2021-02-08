<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\countryModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Auth;

class countryControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(countryModel::get(), 200); //get all country
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //creating a form
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //create table & store Data
    public function store(Request $request)
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
                $responseArray = [];
                $responseArray['token'] = $country->createToken('MyToken')->accessToken;
                return response()->json($country, 201);
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == 1062) {
                    return response()->json(["message" => $e->errorInfo[2]], 400); //$e->errorInfo[2] = specific duplicate index and value
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // show country by ID
    public function show($id)
    {
        $country = countryModel::find($id);
        if (is_null($country)) {
            return response()->json(["message" => 'Record Not found'], 404);
        } else {
            //print_r($country);
            return response()->json($country, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $country = countryModel::find($id);
        if (is_null($country)) {
            return response()->json(["message" => 'Record Not found'], 404);
        } else {
            $country->update($request->all());
            return response()->json($country, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = countryModel::find($id);
        if (is_null($country)) {
            return response()->json(["message" => 'Record Not found'], 404);
        } else {
            $country->delete();
            return response()->json(null, 204);
        }
    }

    public function register(Request $request)
    {
        //same as Registration/Store process
        //first validate data and then create and return response
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $responseArray = [];
            $responseArray['token'] = $user->createToken('MyToken')->accessToken;
            return response()->json($responseArray, 200);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 203);
        }
    }
}