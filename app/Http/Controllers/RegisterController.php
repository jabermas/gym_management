<?php

namespace App\Http\Controllers;

use App\Models\RegisterModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        return view('registerView');
    }

    public function create(Request $request){
        $name = $request->input('name');
        $date_of_joined = $request->input('date_of_join');
        $email = $request->input('email');
        $number = $request->input('contact');
        $plan = $request->input('plan');
        $price = $request->input('price');

        $model = new RegisterModel();
        $model->setRegistrationModel($name, $date_of_joined, $email, $number,$plan, $price);

        return redirect('/members');

    }
}

