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
              'name' => '20220919takanawa.png',
          ],
          [
              'prefecture_id' => 1,
              'order' => 2,
              'name' => '20220919kameido.png',
          ],
          [
              'prefecture_id' => 2,
              'order' => 1,
              'name' => '20220919mukainada.png',
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
