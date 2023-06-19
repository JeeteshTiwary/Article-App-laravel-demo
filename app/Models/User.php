<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;   
use Request;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email', 
        'phone_number', 
        'password',
    ];
}
