<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLimiteMaturityClosureToCreditCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('credit_cards', function (Blueprint $table){
            $table->integer('limit');
            $table->integer('maturity');
            $table->integer('closure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('credit_cards', function($table) {
            $table->dropColumn('limite');
            $table->dropColumn('maturity');
            $table->dropColumn('closure');
        });
    }
}
