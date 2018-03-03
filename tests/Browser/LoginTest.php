<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Landing;
use Tests\Browser\Pages\Login;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Landing)
                    ->pause(2000)
                    ->click('#bs-example-navbar-collapse-1 > div:nth-child(3) > ul > li:nth-child(3) > a')
                    ->on(new Login)
                    ->type('email', 'jbkFrankie@email.com')
                    ->type('password', 'password')
                    ->pause(2000)
                    ->click('.btn')
                    ->assertPathIs('/home');

        });
    }
}
