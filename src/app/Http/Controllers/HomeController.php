<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;
use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    // それのなかの＠の後の、このオブジェクトって決まってるやつを呼び出す
    {
        $prefectures = Prefecture::get();
        $questions = Question::with("choices")->get();
        return view('home', ['prefectures' => $prefectures], ['questions' => $questions]);
    }

    public function question()
    {
        $prefectures = Prefecture::get();
        $questions = Question::with("choices")->get();
        return view('question', ['prefectures' => $prefectures], ['questions' => $questions]);
    }

    public function order()
    {
        $prefectures = Prefecture::get();
        return view('prefecture_order_change', ['prefectures' => $prefectures]);
    }
}
