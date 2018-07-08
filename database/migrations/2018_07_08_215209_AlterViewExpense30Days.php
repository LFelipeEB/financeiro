<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterViewExpense30Days extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->date('date_operation')->change();
        });
        DB::statement("
            CREATE OR REPLACE view expense30days as
              SELECT SUM( (expenses.value/100) ) AS value,
                EXTRACT(DAY FROM expenses.date_operation) AS day,
                expenses.user_id AS user_id
               FROM expenses
              WHERE (expenses.date_operation >= (CURRENT_DATE - '30 days'::interval day))
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
        DB::statement("
            CREATE OR REPLACE view expense30days as
              SELECT SUM( (expenses.value/100) ) AS value,
                date_part('DAY'::text, expenses.created_at) AS day,
                expenses.user_id AS user_id
               FROM expenses
              WHERE (expenses.created_at >= (CURRENT_DATE - '30 days'::interval day))
              GROUP BY user_id, day;
        ");
    }
}
