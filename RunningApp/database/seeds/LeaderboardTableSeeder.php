<?php

use Illuminate\Database\Seeder;

class LeaderboardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Leaderboard::class, 10)->create();

    }
}
