<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoceCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoce_credit_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('credit_card_id');
            $table->integer('category_id');
            $table->date('date_buy');
            $table->string('plots');
            $table->string('place');
            $table->integer('value');
            $table->softDeletes();
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
        Schema::dropIfExists('invoce_credit_cards');
    }
}
