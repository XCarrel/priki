<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($nbDays)
    {
        dd($nbDays);
        return view("home")->with (['filtervalue' => $nbDays ? $nbDays : 5]);
    }
}
