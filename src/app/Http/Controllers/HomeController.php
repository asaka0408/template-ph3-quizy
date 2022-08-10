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
    // ■追加
    public function prefecture_add()
    {
        return view('prefecture_add', ['msg' => 'フォームを入力']);
    }
    public function prefecture_add_post(Request $request)
    {
        $this->validate($request, Prefecture::$rules);
        $prefecture = new Prefecture;
        $form = $request->all();
        unset($form['_token']);
        $prefecture->fill($form)->save();
        return view('prefecture_add', ['msg' => '正しく入力されました！']);
    }
    // ■編集
    public function prefecture_edit(Request $request)
    {
        $id = $request->id;
        $prefecture = Prefecture::find($request->id);
        return view('prefecture_edit', ['form' => $prefecture]);
    }
    public function prefecture_update(Request $request)
    {
        $this->validate($request, Prefecture::$rules);
        $prefecture = Prefecture::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $prefecture->fill($form)->save();
        return redirect('/home');
    }
    // ■削除
    public function prefecture_delete()
    {
        return view('prefecture_delete');
    }
    // ■順序変更
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
        return view('question', ['prefecture' => $prefecture], ['questions' => $questions]);
    }
    public function question_add(Request $request)
    {
        $id = $request->id;
        $prefecture = Prefecture::find($id);
        $questions = Question::where('prefecture_id', $id)->with("choices")->get();
        return view('question_add', ['prefecture' => $prefecture], ['questions' => $questions]);
    }
    public function question_edit(Request $request)
    {
        $id = $request->id;
        $prefecture = Prefecture::find($id);
        $questions = Question::where('prefecture_id', $id)->with("choices")->get();
        return view('question_edit', ['prefecture' => $prefecture], ['questions' => $questions]);
    }
    public function question_delete(Request $request)
    {
        $id = $request->id;
        $prefecture = Prefecture::find($id);
        $questions = Question::where('prefecture_id', $id)->with("choices")->get();
        return view('question_delete', ['prefecture' => $prefecture], ['questions' => $questions]);
    }
}
