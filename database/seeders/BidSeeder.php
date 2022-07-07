<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bids')->insert([
            'advertisement_id' => 2,
            'user_id' => 1,
            'price' => 40000,
        ]);
        DB::table('bids')->insert([
            'advertisement_id' => 2,
            'user_id' => 3,
            'price' => 50000,
        ]);
    }
}
