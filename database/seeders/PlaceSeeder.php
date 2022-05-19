<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'group_id' => 1,
            'name' => Str::random(10),
            'rating' => 4,
            'address' => Str::random(10),
            'description' => Str::random(20),
            'min_guest_quantity' => 1,
            'max_guest_quantity' => 5,
            'concept' => 'city_place',
            'budget' => 1400,
            'time_open' => 10,
            'time_close' => 10,
            'phone' => '8-999-999-99-99',
        ]);
    }
}
