<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = Storage::get('public/category.csv');
        $line = preg_split("/((\r?\n)|(\r\n?))/",$banks);
        foreach ($line as $b){
            \App\Models\Category::create([
                'name' => $b,
            ]);
        }
    }
}
