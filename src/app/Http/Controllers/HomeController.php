<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;
use App\Question;
use App\Choice;
use Illuminate\Foundation\Console\Presets\React;

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
        $prefecture_id = $request->prefecture_id;
        $prefecture = Prefecture::find($request->prefecture_id);
        return view('prefecture_edit', ['prefecture' => $prefecture]);
    }
    public function prefecture_update(Request $request)
    {
        $this->validate($request, Prefecture::$rules);
        $prefecture = Prefecture::find($request->prefecture_id);
        $form = $request->all();
        unset($form['_token']);
        $prefecture->fill($form)->save();
        return redirect('/home');
    }

    // ■削除
    public function prefecture_delete(Request $request)
    {
        $prefecture_id = $request->prefecture_id;
        $prefecture = Prefecture::find($prefecture_id);
        return view('prefecture_delete', ['prefecture' => $prefecture]);
    }
    public function prefecture_remove(Request $request)
    {
        Prefecture::find($request->prefecture_id)->delete();
        return redirect('/home');
    }

    // ■順序変更
    public function order()
    {
        $prefectures = Prefecture::get();
        return view('prefecture_order_change', ['prefectures' => $prefectures]);
    }

    public function order_change(Request $request) {
        $orderIds = explode(',', $request->listIds);
        // このネームのデータを取得して、配列に格納
        foreach($orderIds as $index=>$orderId){
            // 配列の要素を一つずつ回す
            $prefecture=Prefecture::find($orderId);
            // 配列に入ってる要素と同じidのデータを取ってくる
            $prefecture->order = $index + 1;
            // そこに配列の順番を入れる
            $prefecture->save();
        }
        return redirect('/home');
    }



    // 【設問】
    // ■一覧
    public function question(Request $request)
    {
        $prefecture_id = $request->prefecture_id;
        $prefecture = Prefecture::find($prefecture_id);
        $questions = Question::where('prefecture_id', $prefecture_id)->with("choices")->get();
        return view('question', ['prefecture' => $prefecture], ['questions' => $questions]);
    }

    // ■追加
    public function question_add(Request $request)
    {
        $prefecture_id = $request->prefecture_id;
        $prefecture = Prefecture::find($prefecture_id);
        $questions = Question::where('prefecture_id', $prefecture_id)->with("choices")->get();
        return view('question_add',['prefecture_id' => $prefecture_id], ['prefecture' => $prefecture], ['questions' => $questions]);
    }
    public function question_add_post(Request $request, $prefecture_id)
    {
        $prefecture = Prefecture::find($prefecture_id);
        $file = $_FILES['image'];
        $filename = basename($file['name']);
        $path = public_path('image');
        $upload_dir = $path . '/';
        $save_filename = date('YmdHis') . $filename;
        $tmp_path = $file['tmp_name'];
        move_uploaded_file($tmp_path, $upload_dir . $save_filename);
        $question = Question::create([ 
            'prefecture_id' => $prefecture_id,
            'order' => 10,
            'name' => $save_filename,
        ]);
        $choices = $request->choice_name;



        foreach($choices as $index => $choice) {
            if(isset($request['valid' . $index])) {
                $valid = 1;
            } else {
                $valid = 0;
            }
            Choice::insert([
                'question_id' => $question->id, 
                'name' =>$choice,
                'valid' => $valid,
            ]
            ); 
        }



       
        return view('question_add', ['prefecture' => $prefecture],['prefecture_id' => $prefecture_id], ['msg' => '正しく入力されました！']);
    }

    // ■編集
    public function question_edit(Request $request)
    {
        $prefecture_id = $request->id;
        $prefecture = Prefecture::find($prefecture_id);
        $questions = Question::where('prefecture_id', $prefecture_id)->with("choices")->get();
        return view('question_edit', ['prefecture' => $prefecture], ['questions' => $questions]);
    }

    // ■削除
    public function question_delete(Request $request)
    {
        $prefecture_id = $request->id;
        $prefecture = Prefecture::find($prefecture_id);
        $questions = Question::where('prefecture_id', $prefecture_id)->with("choices")->get();
        return view('question_delete', ['prefecture' => $prefecture], ['questions' => $questions]);
    }
}
