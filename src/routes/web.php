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

// 【ユーザー画面】
// ■大問一覧
Route::get('quiz', 'QuizController@index');
// ■問題画面
Route::get('quiz/{id}', 'QuizController@quiz_contents')->name('quiz');
//localhost/quizy/1か2って入れられたら、コントローラーに飛ぶ


// 【最初のララベルの画面】
// ■ログイン画面
Route::get('/', function () {return view('welcome');});
Auth::routes();


// 【管理者画面】
// ■大問一覧
Route::get('/home', 'HomeController@index')->name('home');
// ■大問追加
Route::get('/home/prefecture/add', 'HomeController@prefecture_add')->name('prefecture_add');
Route::post('/home/prefecture/add', 'HomeController@prefecture_add_post')->name('prefecture_add');
// ■大問編集
Route::get('/home/prefecture/edit/{id}', 'HomeController@prefecture_edit')->name('prefecture_edit');
Route::post('/home/prefecture/edit/{id}', 'HomeController@prefecture_update');
// ■大問削除
Route::get('/home/prefecture/delete/{id}','HomeController@prefecture_delete')->name('prefecture_delete');
Route::post('/home/prefecture/delete/{id}','HomeController@prefecture_remove');
// ■大問順番変更
Route::get('/home/prefecture/order_change', 'HomeController@order')->name('prefecture_order_change');

// ■設問一覧
Route::get('/home/question', 'HomeController@question')->name('question');
// ■設問追加
Route::get('/home/question_add', 'HomeController@question_add')->name('question_add');
// ■設問編集
Route::get('/home/question_edit', 'HomeController@question_edit')->name('question_edit');
// ■設問削除
Route::get('/home/question_delete', 'HomeController@question_delete')->name('question_delete');
