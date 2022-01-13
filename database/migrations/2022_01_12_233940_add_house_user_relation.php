<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHouseUserRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('houses')) {
            Schema::table('houses', function (Blueprint $table) {
                $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained()->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('houses')) {
            Schema::table('houses', function (Blueprint $table){
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            });
        }
    }
}
