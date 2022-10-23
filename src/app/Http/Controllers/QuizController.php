<?php 
namespace App\Http\Controllers;

use App\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Question;

class QuizController extends Controller
// ルートで指定している、＠より前の部分の名前
{
    public function index(Request $request)
    {
      $prefectures = Prefecture::get();
      return view('quiz.quiz_list', ['prefectures' => $prefectures]);
    }

    public function quiz_contents(Request $request)
    // それのなかの＠の後の、このオブジェクトって決まってるやつを呼び出す
    {
      $prefecture_id = $request->prefecture_id;
      $prefecture = Prefecture::find($prefecture_id);
      $questions = Question::where('prefecture_id', $prefecture_id)->with("choices")->get();
      // _φ(･_･モデルって1個取り出してきて、この子の性質は？って感じだから、単数形
      // 集合ではなく、単体の性質
      // withの中にある変数はモデルの関数名
      return view('quiz.quiz', ['prefecture' => $prefecture],['questions' => $questions]);
    }
}