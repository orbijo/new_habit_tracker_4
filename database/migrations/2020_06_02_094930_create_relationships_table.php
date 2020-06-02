<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('habits', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
        Schema::table('ratings', function (Blueprint $table) {
            $table->foreignId('habit_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('habits', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropForeign(['habit_id']);
        });
    }
}
