<?php

use Illuminate\Database\Seeder;

class ParcoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Parcour::class, 20)->create();
    }
}