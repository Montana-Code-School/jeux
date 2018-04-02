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
    public function testFrankie1CanLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Landing)
                    ->pause(2000)
                    ->click('@b3')
                    ->on(new Login)
                    ->type('email', 'jbkFrankie1@email.com')
                    ->type('password', 'password')
                    ->pause(2000)
                    ->click('.btn')
                    ->pause(2000)
                    ->on(new Home)
                    ->pause(2000)
                    ->mouseover('@tile-game-image')
                    ->type('@search-games-input', 'settlers')
                    ->pause(3000)
                    ->click('@search-games-submit')
                    ->pause(3000)
                    ->mouseover('@tile-game-image')
                    ->pause(2000);
        });
    }
}
