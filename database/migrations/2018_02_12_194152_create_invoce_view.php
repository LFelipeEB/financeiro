<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoceView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW invoce AS
          SELECT c.id, nickname, sum(value) as value, date_part('month', date_buy) as month, date_part('year', date_buy) as year
          FROM
            invoce_credit_cards AS i JOIN credit_cards AS c ON i.credit_card_id = c.id
          GROUP BY
            month, year, nickname, c.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
