<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterViewBalance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE VIEW expense_account AS
              SELECT a.id, a.category_id, SUM(e.value / 100) AS value
              FROM accounts AS a JOIN expenses AS e on a.id = e.account_id
              WHERE e.date_operation < now() or e.date_operation ISNULL
              GROUP BY a.id, a.category_id;
        ");
        DB::statement("
            CREATE OR REPLACE view profit_account as
              SELECT a.id,
                a.account,
                a.agency,
                a.category_id,
                b.name,
                a.user_id,
                sum((p.value / 100)) AS value
              FROM ((accounts a
                 JOIN profits p ON ((a.id = p.account_id)))
                 JOIN banks b ON ((a.bank_id = b.id)))
              WHERE p.date_operation < now() or p.date_operation ISNULL
              GROUP BY a.id, a.category_id, b.name;
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
            CREATE OR REPLACE VIEW expense_account AS
              SELECT a.id, a.category_id, SUM(e.value) AS value
              FROM accounts AS a JOIN expenses AS e on a.id = e.account_id
              WHERE e.date_operation < now() or e.date_operation ISNULL
              GROUP BY a.id, a.category_id;
        ");

        DB::statement("
            CREATE OR REPLACE view profit_account as
              SELECT a.id,
                a.account,
                a.agency,
                a.category_id,
                b.name,
                a.user_id,
                sum((p.value / 100)) AS value
              FROM ((accounts a
                 JOIN profits p ON ((a.id = p.account_id)))
                 JOIN banks b ON ((a.bank_id = b.id)))
              WHERE p.date < now() or p.date ISNULL
              GROUP BY a.id, a.category_id, b.name;
              ");
    }
}
