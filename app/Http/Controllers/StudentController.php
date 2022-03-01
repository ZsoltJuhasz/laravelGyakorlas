<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentData;
use Illuminate\Support\Facades\Validator;
// use Validator;


class StudentController extends Controller
{
    public function myForm(Request $request)
    {

        // if($request->isMethod("post")){

        //     $request->validate([
        //         "name" => "required|min:4|max:20",
        //         "email" => "required",
        //         "phone" => "required|digits_between:9,11"
        //     ], [
        //         "name.required" => "Név kötelező",
        //         "email.required" => "Email kötelező",
        //         "phone.required" => "Telefonszám kötelező"
        //     ]);
        // }

        print_r($request->all());
        return view("my_form");
    }

    public function addStudent()
    {
        return view("my_form");
    }

    public function submitStudent(Request $request)
    {

        $validate = Validator::make($request->all(), [
            "name" => "required|min:4|max:20",
            "email" => "required",
            "phone" => "required|digits_between:9,11"
        ],
        [
            "name.required" => "Név kötelező",
            "email.required" => "Email kötelező",
            "phone.required" => "Telefonszám kötelező",
        ])->validate();

        // if($validate->fails() ){
        //     return redirect("add-student")->withErrors($validate)->withInput();
        // }
        // $request->validate();
        print_r($request->all());
    }
}
