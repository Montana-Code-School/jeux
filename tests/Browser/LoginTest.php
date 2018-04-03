<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Landing;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\SearchResults;

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
                    ->pause(2000)
                    ->on(new Login)
                    ->type('email', 'jbkFrankie1@email.com')
                    ->type('password', 'password')
                    ->pause(2000)
                    ->click('@login')
                    ->pause(4000)
                    // ->mouseover('@tile-front')
                    ->pause(2000)
                    ->on(new Home)
                    ->pause(2000)
                    ->type('@search-games-input', 'the')
                    ->pause(3000)
                    ->click('@search-games-submit')
                    ->pause(4000)
                    // ->mouseover('@tile-front')
                    ->pause(2000)
                    ->on(new SearchResults)
                    ->pause(2000)
                    ->click('@user-dropdown-toggle')
                    ->pause(3000)
                    ->click('@user-logout')
                    ->pause(2000);
        });
    }
}
