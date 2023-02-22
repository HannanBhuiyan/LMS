<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\{
    AdminDasdhboardController,
    AssignStudentController,
    BatchController,
    Class_contentController,
    CourseController,
    ProfileController,
    StudentController,
    StudentDasdhboardController
};
use App\Http\Controllers\frontend\HomeController;


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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('course/{slug}', [HomeController::class, 'course_show'])->name('home.course');

//Contact Form Route
Route::post('contact', [HomeController::class, 'store'])->name('contact');


Route::middleware('admin:admin')->group(function(){

    Route::get('/admin/login', [AdminController::class, 'loginForm']);
    Route::post('/admin/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware('auth:admin')->group(function(){

    Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'),'verified'])->group(function (){
        Route::get('/admin/dashboard', [AdminDasdhboardController::class, 'index'])->name('admin.dashboard');
    });

    //All Admin Route
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');


    //Course Route
    Route::resource('courses', CourseController::class);
    Route::get('courses/delete/{id}', [CourseController::class, 'destroy'])->name('courses.delete');
    Route::get('courses/inactive/{id}', [CourseController::class, 'inactive'])->name('course.inactive');
    Route::get('courses/active/{id}', [CourseController::class, 'active'])->name('course.active');

    //Student Route
    Route::resource('student', StudentController::class);
    Route::get('student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');

    Route::get('students/managenemt', [StudentController::class, 'studentManagement'])->name('students.management');

    Route::get('students/disabled/{id}', [StudentController::class, 'studentDisabled'])->name('students.disabled');
    Route::get('students/active/{id}', [StudentController::class, 'studentActive'])->name('students.active');





    // assign student
    Route::resource('assignstudent', AssignStudentController::class);
    Route::get('assignstudent/delete/{id}', [AssignStudentController::class, 'destroy'])->name('assignstudent.delete');
    Route::post('assignstudent/batch-dropdown', [AssignStudentController::class, 'dropdown'])->name('assignstudent.dropdown');


    //Class_content Route
    Route::resource('class-content', Class_contentController::class);
    Route::get('class-content/delete/{id}', [Class_contentController::class, 'destroy'])->name('class.content.delete');

    //Batch Route
    Route::resource('batch', BatchController::class);
    Route::get('batch/delete/{id}', [BatchController::class, 'destroy'])->name('batch.delete');

    //Contact
    Route::get('contact/index', [HomeController::class, 'show'])->name('contact.index');
    Route::get('contact/delete/{id}', [HomeController::class, 'destroy'])->name('contact.delete');

});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function (){
    Route::get('/dashboard', [StudentDasdhboardController::class, 'index'])->name('dashboard');
    Route::post('/profile/image/edit', [ProfileController::class, 'update_image'])->name('profile.image.update');
    Route::get('/course-list', [StudentDasdhboardController::class, 'showAllCourse'])->name('student.showallcourses');
    Route::get('/single/course/show/{id}', [StudentDasdhboardController::class, 'singleCourseShow'])->name('single.course.show');

});



