<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    public function index()
    {
        $country=DB::table('country')->get();
        return view('home',compact('country'));
    }

    public function fetchcountry(Request $request)
    {
        $data=DB::table('country')->get();
        foreach($data as $country)
        {
            echo "<option value='".$country->id."'>".$country->country_name."</option>";
        }
    }

    public function fetchstate(Request $request)
    {
        $data=DB::table('state')->where('country_id',$request->countryID)->get();
        foreach($data as $state)
        {
            echo "<option>".$state->state_name."</option>";
        }
    }
}
