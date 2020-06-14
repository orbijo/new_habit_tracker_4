<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyinteger('rating');     
            $table->foreignId('habit_id');
            $table->foreignId('user_id');

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
<<<<<<< Updated upstream:database/migrations/2020_06_02_094930_create_relationships_table.php
        Schema::table('habits', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropForeign(['habit_id']);
        });
=======
        Schema::dropIfExists('ratings');
>>>>>>> Stashed changes:database/migrations/2020_06_05_104030_create_ratings_table.php
    }
}
