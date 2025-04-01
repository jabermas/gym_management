<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logInContoller extends Controller
{
    public function logIn(){
        return view('logIn');
    }
}
