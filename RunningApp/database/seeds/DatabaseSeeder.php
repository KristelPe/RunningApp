<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ScheduleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BadgeTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(LeaderboardTableSeeder::class);

    }
}
