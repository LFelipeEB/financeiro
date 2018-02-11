<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitAccountView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create view profit_account as
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
        DB::statement("DROP VIEW profit_account");
    }
}
