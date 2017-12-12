<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('#WEARERUNNERS');
        });
    }

    public function testHomeLoggedIn()
    {
        $this->browse(function (Browser $browser) {

            $user = \App\User::first();

            $browser->loginAs($user)
                ->visit('/')
                ->assertDontSee('#WEARERUNNERS');
        });
    }

    public function testProfile()
    {
        $this->browse(function (Browser $browser) {

            $user = \App\User::first();

            $browser->loginAs($user)
                ->visit('/profile')
                ->assertSee(strtoupper($user->firstName.' '.$user->lastName));
        });
    }

    public function testParcours()
    {
        $this->browse(function (Browser $browser) {

            $user = \App\User::first();

            $browser->loginAs($user)
                ->visit('/parcours')
                ->assertSee('Personal');
        });
    }

    public function testAdminUsers()
    {
        $this->browse(function (Browser $browser) {

            $user = \App\User::first();

            if ($user->admin){
                $browser->loginAs($user)
                    ->visit('/users')
                    ->assertPathIs('/users');
            }else{
                $browser->loginAs($user)
                    ->visit('/users')
                    ->assertPathIsNot('/users');
            }


        });
    }

    public function testAdminSchedules()
    {
        $this->browse(function (Browser $browser) {

            $user = \App\User::first();

            if ($user->admin){
                $browser->loginAs($user)
                    ->visit('/schedules')
                    ->assertPathIs('/schedules');
            }else{
                $browser->loginAs($user)
                    ->visit('/schedules')
                    ->assertPathIsNot('/schedules');
            }

        });
    }

    public function testHallOfFame()
    {
        $this->browse(function (Browser $browser) {
                $browser->visit('/halloffame')
                    ->assertSee('THESE CHAMPIONS COMPLETED THIS WEEKS GOAL!');
        });
    }

}
