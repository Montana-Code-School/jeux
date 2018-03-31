<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Landing;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Register;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCanMakeUserAmita()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Landing)
                    ->pause(2000)
                    ->click('a[href="http://localhost:8888/login"]')
                    ->click('a[href="http://localhost:8888/register"]')
                    ->on(new Register)
                    ->pause(2000)
                    ->type('name', 'Amita')
                    ->pause(2000)
                    ->type('username', 'AmitaIsAwesome')
                    ->pause(2000)
                    ->type('email', 'amita@email.com')
                    ->pause(2000)
                    ->type('password', 'password')
                    ->pause(2000)
                    ->type('password_confirmation', 'password')
                    ->pause(2000)
                    ->click('.btn')
                    ->pause(2000);
        });
    }
}
