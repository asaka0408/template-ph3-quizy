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

// 【大問】
//  ■一覧
    public function index()
    {
        $prefectures = Prefecture::get();
        $questions = Question::with("choices")->get();
        return view('home', ['prefectures' => $prefectures], ['questions' => $questions]);
    }
// 順序変更
    public function order()
    {
        $prefectures = Prefecture::get();
        return view('prefecture_order_change', ['prefectures' => $prefectures]);
    }

// 【設問】
// ■一覧
    public function question(Request $request)
    {
      $id = $request->id;
      $prefecture = Prefecture::find($id);
      $questions = Question::where('prefecture_id', $id)->with("choices")->get();
      return view('question', ['prefecture' => $prefecture],['questions' => $questions]);
    }
    public function question_add(Request $request)
    {
      $id = $request->id;
      $prefecture = Prefecture::find($id);
      $questions = Question::where('prefecture_id', $id)->with("choices")->get();
      return view('question_add', ['prefecture' => $prefecture],['questions' => $questions]);
    }
    public function question_edit(Request $request)
    {
      $id = $request->id;
      $prefecture = Prefecture::find($id);
      $questions = Question::where('prefecture_id', $id)->with("choices")->get();
      return view('question_edit', ['prefecture' => $prefecture],['questions' => $questions]);
    }
    public function question_delete(Request $request)
    {
      $id = $request->id;
      $prefecture = Prefecture::find($id);
      $questions = Question::where('prefecture_id', $id)->with("choices")->get();
      return view('question_delete', ['prefecture' => $prefecture],['questions' => $questions]);
    }
    
}
