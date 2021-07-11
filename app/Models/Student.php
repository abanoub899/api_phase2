<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Santcum\HasApiTokens;
class Student extends Model
{
    use HasFactory,App\Models\HasApiTokens;
    protected $table="students";
    protected $fillabel=['name','email','password','phone'];

}
