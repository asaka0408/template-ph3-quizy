<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
          [ 
            'name' => '東京の難読地名クイズ',
            'order' => 1,
          ],
          [ 
            'name' => '広島の難読地名クイズ',
            'order' => 2,
          ],
        ];
        foreach($params as $param) {
          DB::table('prefectures')->insert($param);
        }

        $question_params = [
          [
              'prefecture_id' => 1,
              'order' => 1,
              'name' => '高輪',
              'image' => 'https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png'
          ],
          [
              'prefecture_id' => 1,
              'order' => 2,
              'name' => '亀戸',
              'image' => 'https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png'
          ],
          [
              'prefecture_id' => 2,
              'order' => 1,
              'name' => '向洋',
              'image' => 'https://d1khcm40x1j0f.cloudfront.net/quiz/d876208414d51791af9700a0389b988b.png'
          ],
        ];
        foreach($question_params as $question_param) {
          DB::table('questions')->insert($question_param);
        }

        $choice_params = [
          [
              'question_id' => 1,
              'name' => 'たかなわ',
              'valid' => 1,
          ],
          [
              'question_id' => 1,
              'name' => 'たかわ',
              'valid' => 0,
          ],
          [
              'question_id' => 1,
              'name' => 'こうわ',
              'valid' => 0,
          ],
          [
              'question_id' => 2,
              'name' => 'かめと',
              'valid' => 0,
          ],
          [
              'question_id' => 2,
              'name' => 'かめど',
              'valid' => 0,
          ],
          [
              'question_id' => 2,
              'name' => 'かめいど',
              'valid' => 1,
          ],
          [
              'question_id' => 3,
              'name' => 'むこうひら',
              'valid' => 0,
          ],
          [
              'question_id' => 3,
              'name' => 'むきひら',
              'valid' => 0,
          ],
          [
              'question_id' => 3,
              'name' => 'むかいなだ',
              'valid' => 1,
          ],
        ];
        foreach($choice_params as $choice_param) {
          DB::table('choices')->insert($choice_param);
        }
    }
}
