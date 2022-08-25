<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    // テーブル作るよ
    // prefecture, selection, choice
    {
        Schema::create('prefectures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            // 問題番号に対応させる
            $table->bigIncrements('id');
            $table->integer('prefecture_id');
            $table->integer('order');
            $table->string('name');
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('choices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id');
            $table->string('name');
            $table->boolean('valid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    // 書かない
    {
        Schema::dropIfExists('prefectures');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('choices');
    }
}
