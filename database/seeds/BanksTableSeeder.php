<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = Storage::get('public/bancos.csv');
        $line = preg_split("/((\r?\n)|(\r\n?))/",$banks);
        foreach ($line as $b){
            $info = explode(';', $b);
            \App\Models\Bank::create([
                'name' => $info[1],
                'number'=> $info[0],
                'url' => $info[2],
            ]);
        }
    }
}
