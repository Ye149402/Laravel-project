<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//})->name('home');

Route::get('/showui', [App\Http\Controllers\IntroController::class, 'show']);
Route::get('/test', [App\Http\Controllers\IntroController::class, 'testfun']);



Route::get('/', [App\Http\Controllers\TemplateController::class, 'index'])->name('homepage');
Route::get('/about', [App\Http\Controllers\TemplateController::class, 'about'])->name('aboutpage');
Route::get('/post', [App\Http\Controllers\TemplateController::class, 'post'])->name('postpage');
Route::get('/contact', [App\Http\Controllers\TemplateController::class, 'contact'])->name('contactpage');


Route::get('/table', [App\Http\Controllers\BackendTemplateController::class, 'tablefun'])->name('tablepage');



Route::resource('categories',CategoryController::class);


Route::resource('students',StudentController::class);




Route::resource('books',BookController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
