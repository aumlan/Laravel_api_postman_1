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
}