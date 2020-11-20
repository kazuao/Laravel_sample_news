<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_entry', function (Blueprint $table) {
            $table->id();
            //記事のデータ
			$table->string("title");
			$table->string("description");
			$table->string("body");
			$table->string("thumbnail_url");
            $table->string("image_url");

            // ユーザテーブルと連携するためのカラム
            $table->bigInteger('user_id')->unsigned();

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_entry');
    }
}
