<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



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

        $validate = Validator::make(
            $request->all(),
            [
                "name" => "required|min:4|max:20",
                "email" => "required",
                "phone" => "required|digits_between:9,11"
            ],
            [
                "name.required" => "Név kötelező",
                "email.required" => "Email kötelező",
                "phone.required" => "Telefonszám kötelező",
            ]
        )->validate();

        // if($validate->fails() ){
        //     return redirect("add-student")->withErrors($validate)->withInput();
        // }
        // $request->validate();
        print_r($request->all());
    }

    public function listStudent()
    {
        $students = DB::table("students")
            ->select(
                "students.name as Név ",
                "students.email as Email",
                "courses.course as Tanfolyam",
                "courses.price as Ár"
            )
            ->rightjoin("courses", "students.id", "=", "courses.student_id")->get();

        echo "<pre>";
        print_r($students);

        //SELECT * FROM students  WHERE id = 3
        //SELECT * FROM students WHERE id = 1 AND name = "Raul Marvin" OR "onicolas@example.net"
        //SELECT * FROM students WHERE id = BETWEEN 2 AND 10
    }

    public function listStudentTrainingVersion()
    {
        $students = DB::table("students")
            ->where("email", "kelton.stracke@example.com")
            ->orWhere("phone", "563-885-6514")
            ->orWhere("email", "like", "%example.com")
            ->orWhere("name", "like", "%mmer%")->get();

        echo "<pre>";
        print_r($students);
    }

    public function orgEmailList()
    {
        $students = DB::table("students")
            ->select(
                "students.name as Név ",
                "students.email as Email"
            )
            ->where("phone", "281-982-6389")
            ->orWhere("email", "fortiz@example.org")->get();

        echo "<pre>";
        print_r($students);
    }

    public function listJavaCourses()
    {
        $students = DB::table("students")
            ->select(
                "students.name as Név ",
                "students.email as Email",
                "students.phone as Telefon"
            )
            ->where("courses.course", "=", "Java")
            ->join("courses", "students.id", "=", "courses.student_id")->get();

        echo "<pre>";
        print_r($students);
    }

    public function insertCourse()
    {
        DB::table("courses")->insert(
            [
                ["course" => "Django", "price" => 220000, "student_id" => 14],
                ["course" => "C++", "price" => 180000, "student_id" => 23]
            ]
        );
        echo "Adatok elmentve";
    }

    public function updateCourse()
    {
        DB::table("courses")->where("id", 6)->update([
            "course" => "Angular",
            "price" => 170000,
            "student_id" => 38
        ]);

        echo "Módosítás sikeres";
    }

    public function updateOrInsert()
    {
        DB::table("courses")->updateOrInsert(
            ["course" => "C"],
            ["course" => "C", "price" => 100000, "student_id" => 4]
        );

        echo "Adatok frissítve";
    }

    public function deleteCourse()
    {
        DB::table("courses")->truncate();
        //DB::table("courses")->delete() ez törli az összes adatot a táblából
        //DB::table("courses")->where("id", 4)->delete();
        // DB::table("courses")->truncate(); újra az 1-es id-val kezdi a számozást a törlés után
    } 
}
