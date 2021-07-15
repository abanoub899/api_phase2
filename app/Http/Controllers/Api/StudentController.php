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
        //validation
$request->validate([
    "email"=>"required|email|unique:students",
    "password"=>"required|confirmed"
]);
        // check student
$student=Student::where("email","=",$request->email)->first();
if(isset($student->id)){
// create santcum token
if(Hash::check($request->password, $student->password))
{
    // $token=$student->createToken("auth_token")->PlainTextToken;
    return response()->json(["status"=>1,"message"=>"sudent logged in successfuly"]);

}else{
    return response()->json(["status"=>0,"message"=>"password didnt match"],404); 
}
//send response

}else{
    return response()->json(["status"=>0,"message"=>"failed to find student"],404);

}
        

    }
    public function profile()
    {

    }
    public function logout(){

    }
}
