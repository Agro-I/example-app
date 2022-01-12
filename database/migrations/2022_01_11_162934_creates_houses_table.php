<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название')->nullable();
            $table->string('emblem')->comment('Герб');
            $table->string('ancestral_fortress')->comment('Родовая крепость');
            $table->string('slogan')->comment('Девиз')->nullable();
            $table->integer('quantity_of_characters')->comment('Кол-во персонажей');
            $table->integer('quantity_of_live_characters')->comment('Кол-во живых персонажей');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
