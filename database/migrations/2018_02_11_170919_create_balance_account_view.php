<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceAccountView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create view balance_account as
              SELECT p.id,
                p.user_id,
                p.category_id,
                p.account,
                p.agency,
                p.name,
                sum((COALESCE(p.value, (0)::bigint) - COALESCE(e.value, (0)::bigint))) AS value
               FROM (expense_account e
                 RIGHT JOIN profit_account p ON ((e.id = p.id)))
              GROUP BY p.id, p.category_id, p.account, p.agency, p.name, p.user_id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW balance_account");
    }
}
