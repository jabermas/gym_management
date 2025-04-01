<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coachModel extends Model
{
    use HasFactory;

    protected $table = 'coaches';
    protected $fillable = ['name', 'email', 'specialty'];
}
