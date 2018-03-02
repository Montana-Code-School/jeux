<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
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
            $browser->visit(new Login)
                    ->type('email', 'jbkFrankie@email.com')
                    ->type('password', 'password')
                    ->pause(2000)
                    ->click('.btn')
                    ->assertPathIs('/home');

        });
    }
}
