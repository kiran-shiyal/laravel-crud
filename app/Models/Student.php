<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'first_name',
        'email',
        'password',
        'dob',
        'gender',
        'contact_number',
        'profile_picture'
    ];
}