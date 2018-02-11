<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create view profit30days as
              SELECT SUM( (profits.value/100) ) AS value,
                date_part('DAY'::text, profits.created_at) AS day,
                profits.user_id
               FROM profits
              WHERE (profits.created_at >= (CURRENT_DATE - '30 days'::interval day))
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
        Schema::dropIfExists('profit30days');
    }
}
