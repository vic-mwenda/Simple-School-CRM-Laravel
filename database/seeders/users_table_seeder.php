<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        Schema::table('users')->truncate();
        foreach (range(1,50)as $index) {
            Schema::table('users')->insert([
                'name' => $faker->sentence(2),
                'email' => $faker->email,
                'password' => $faker->password,
            ]);
        }
    }
}
