<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthManager extends Controller
{
    
    function login(){

        return view('auth.login');

    }

    function loginPost(Request $request){


    }
}
