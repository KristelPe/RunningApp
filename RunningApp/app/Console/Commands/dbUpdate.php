<?php

namespace App\Console\Commands;

use App\Activity;
use App\Http\Controllers\StravaController;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class dbUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The database has been updated!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (User::all() as $user){
            $acts = StravaController::getAllUserActivity($user->token);

            foreach ($acts as $actClass){
                $act['elev_high'] = 0;
                $act['elev_low'] = 0 ;
                $act = (array)$actClass;


                if (Activity::where('id', '=', $act['id'])->exists()) {
                }else {
                    if (env("BETA", 0) == 1 || !$act['manual'] && $act != null && $act['distance'] < 25000 && $act['max_speed'] < 25 && $act['moving_time'] < 9000) {
                        $athlete = (array)$act['athlete'];

                        $act['start_date_local'] = preg_replace('/[^0-9.]+/', '', $act['start_date_local']);
                        $act['start_date_local'] = substr($act['start_date_local'], 0, 4) . "-" . substr($act['start_date_local'], 4, 2) . "-" . substr($act['start_date_local'], 6, 2);


                        if($act['manual']){
                            $elevHigh = 0;
                        }else{
                            $elevHigh = $act['elev_high'];
                        }

                        if($act['manual']){
                            $elevLow = 0;
                        }else{
                            $elevLow = $act['elev_low'];
                        }

                        if($act['manual']){
                            $poly = 0;
                        }else{
                            $poly = $act['map']->summary_polyline;
                        }

                        $newActivity = Activity::create([
                            'id' => $act['id'],
                            'athlete_id' => $athlete['id'],
                            'name' => $act['name'],
                            'distance' => $act['distance'],
                            'start_date_local' => $act['start_date_local'],
                            'max_speed' => $act['max_speed'],
                            'average_speed' => $act['average_speed'],
                            'type' => $act['type'],
                            'moving_time' => $act['moving_time'],
                            'elapsed_time' => $act['elapsed_time'],
                            'kudos_count' => $act['kudos_count'],
                            'map_polyline' => $poly,
                            'elev_high' => $elevHigh,
                            'elev_low' => $elevLow,
                        ]);

                        $newActivity->save();

                    }
                }
            }

        }

        \Log::info('I tested at ' . Carbon::now());
    }
}
