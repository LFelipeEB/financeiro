<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create view expense30days as
              SELECT SUM( (expenses.value/100) ) AS value,
                date_part('DAY'::text, expenses.created_at) AS day,
                expenses.user_id AS user_id
               FROM expenses
              WHERE (expenses.created_at >= (CURRENT_DATE - '30 days'::interval day))
              GROUP BY user_id, day;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense30days');
    }
}
