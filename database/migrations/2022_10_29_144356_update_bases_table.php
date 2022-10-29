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
        Schema::table('bases', function (Blueprint $table) {
            $table->boolean('release_exist')->default(0)->after('place');
            $table->string('release_name')->nullable()->change();
            $table->boolean('event_exist')->default(0)->after('release_link');
            $table->string('event_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bases', function (Blueprint $table) {
            $table->dropColumn('release_exist');
            $table->string('release_name')->nullable(false)->change();
            $table->dropColumn('event_exist');
            $table->string('event_name')->nullable(false)->change();
        });
    }
};
