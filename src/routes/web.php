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

Route::get('/', function () {
    return view('welcome');
});

// localhost/quizって入れられてたら、このビューを返す
Route::get('quiz', function () {
    return view('quiz.quiz_list');
});

//localhost/quizy/1か2って入れられたら、コントローラーに飛ぶ
Route::get('quiz/{big_question_index}', 'QuizController@quiz_list');

