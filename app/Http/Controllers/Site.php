<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Site extends Controller
{
    public function getStudents()
    {

        $students = DB::select("SELECT * FROM students
                                WHERE id = :id", ["id" => 1]);
        echo "<pre>";
        // print_r($students);

        foreach ($students as $student) {

            echo $student->name . ", " .
                $student->email . ", " .
                $student->phone . "<br>";
        }
    }

    public function insertStudent() {

        DB::insert("INSERT INTO students ( name, email, phone ) 
                    VALUES (?,?,?)", [
                        "Pumped Gabo",
                        "gabo@valami.hu",
                        "321456987"
                    ]);
    }

    public function updateStudent(){

        $student = DB::update( "UPDATE students SET email = ?
                                WHERE id = ?", 
                                ["gabo@semmi.hu", 4]);

        print_r($student);
    }

    public function deleteStudent(){

        $student = DB::delete("DELETE FROM students WHERE id = :id",
                             ["id" => 4]);
        print_r($student);
    }
}
