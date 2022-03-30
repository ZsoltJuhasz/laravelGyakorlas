<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Site;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/about", function () {
    return view("about", [
        "page" => "Rólunk"
    ]);
});

Route::get("/about-us", function () {
    return view("admin.about-us", [
        "names" => ["Béla", "Géza", "Kata"]
    ]);
});

Route::get("/products", function () {
    return view("products", [
        "page" => "Termékek"
    ]);
});

Route::get("/name", function () {
    return view("components.name", [
        "names" => ["Sára", "Márk", "Péter"]
    ]);
});

Route::get("/contact", function () {
    return view("contact", [
        "contacts" => ["Alexandra, Ákos, Viktor "]
    ]);
});

// Route::get("/my_form", [StudentController::class, "myForm"]);
// Route::post("/submit_student", [StudentController::class, "submitStudent"]);

// Route::match(["get", "post"], "/add-student", [StudentController::class, "myForm"]);
Route::match(["get", "post"], "/add-product", [ProductsController::class, "addProducts"]);

// Route::get("/add-student", [StudentController::class, "addStudent"]);
// Route::post("/submit-student", [StudentController::class, "submitStudent"]);

Route::get("/get-users", [Site::class, "getStudents"]);
Route::get("/add-student", [Site::class, "insertStudent"]);
Route::get("/update-student", [Site::class, "updateStudent"]);
Route::get("/delete-student", [Site::class, "deleteStudent"]);

Route::get("/list-student", [StudentController::class, "listStudent"]);
Route::get("/list-student-training-version", [StudentController::class, "listStudentTrainingVersion"]);
Route::get("/list-org-email-list", [StudentController::class, "orgEmailList"]);
Route::get("/list-java-courses", [StudentController::class, "listJavaCourses"]);

Route::get("/insert-course", [StudentController::class, "insertCourse"]);
Route::get("/update-course", [StudentController::class, "updateCourse"]);
Route::get("/update-or-insert", [StudentController::class, "updateOrInsert"]);
Route::get("/delete-course", [StudentController::class, "deleteCourse"]);

Route::get("{local}/service", [ServiceController::class, "service"]); //a local az egy változó itt
