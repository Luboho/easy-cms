<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;

class NavLogoController extends Controller
{
    public function getNavLogo() 
    {
        $logos = Logo::all();

        return view('layouts.app', compact('logos'));
    }
}
