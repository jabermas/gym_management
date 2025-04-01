<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegisterModel extends Model
{
    public function setRegistrationModel($name, $date_of_joined, $email, $number, $plan, $price){
        DB::insert('INSERT INTO members (name, date_of_joined, email, contact, plan, price) VALUES (?,?,?,?,?,?)', [$name, $date_of_joined, $email, $number, $plan, $price]);
    }
}
