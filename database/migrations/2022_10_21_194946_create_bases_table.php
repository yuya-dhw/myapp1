<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bases', function (Blueprint $table) {
            $table->id();
            $table->integer('global_id');
            $table->string('project_name')->default('プロジェクト名を設定');
            $table->string('copy')->default('キャッチコピーを設定');
            $table->string('genre')->default('ジャンル');
            $table->string('type')->default('活動形式');
            $table->string('place')->default('活動地域');
            $table->date('release_date')->nullable();
            $table->string('release_type')->default('未設定');
            $table->string('release_name')->default('リリースはありません');
            $table->string('release_link')->nullable();
            $table->date('event_date')->nullable();
            $table->string('event_pref')->default('未選択');
            $table->string('event_place')->nullable();
            $table->string('event_name')->default('イベントはありません');
            $table->string('event_link')->nullable();
            $table->string('event_link_com')->nullable();
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
        Schema::dropIfExists('bases');
    }
};
