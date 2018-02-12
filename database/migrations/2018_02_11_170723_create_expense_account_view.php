<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseAccountView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW expense_account AS
              SELECT a.id, a.category_id, SUM(e.value) AS value
              FROM accounts AS a JOIN expenses AS e on a.id = e.account_id
              WHERE p.date < now() or p.date ISNULL
              GROUP BY a.id, a.category_id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW expense_account");
    }
}
