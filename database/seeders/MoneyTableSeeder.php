<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Money;

class MoneyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Money::create([
            'price'=>100000,
            'comment'=>'test1',
        ]);

        Money::create([
            'price'=>25000,
            'comment'=>'test test2',
        ]);
    }
}
