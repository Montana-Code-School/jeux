<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Landing;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Home;

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
                    ->click('a[href="http://localhost:8888/login"]')
                    ->on(new Login)
                    ->type('email', 'jbkFrankie1@email.com')
                    ->type('password', 'password')
                    ->pause(2000)
                    ->click('.btn')
                    ->pause(2000)
                    ->on(new Home);
        });
    }
}
