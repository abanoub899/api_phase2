<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    //
    public function register(Request $request)
    {

        //validation 
$request->validate([
"name"=>"required",
"email"=>"required|email|unique:students",
"password"=>"required|confirmed",
"phone"=>"required"

]);

$student=new Student();
$student->name=$request->name;
$student->email=$request->email;
$student->password=Hash::make($request->password);
$student->phone=$request->phone;
$student->save();
return response()->json([
    'status'=>1,
    'message'=>'register completed'
]);
        //create data

        //send response

    }
    public function login(Request $request)
    {

    }
    public function profile()
    {

    }
    public function logout(){

    }
}
