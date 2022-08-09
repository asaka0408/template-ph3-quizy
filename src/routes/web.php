<?php

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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

// localhost/quizって入れられてたら、このビューを返す
Route::get('quiz', 'QuizController@index');

//localhost/quizy/1か2って入れられたら、コントローラーに飛ぶ
Route::get('quiz/{id}', 'QuizController@quiz_contents')->name('quiz');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
