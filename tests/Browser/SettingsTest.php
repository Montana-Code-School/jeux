<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Landing;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Home;

class SettingsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFrankie2CanBorrowGame()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Landing)
                    ->pause(2000)
                    ->click('a[href="http://localhost:8888/login"]')
                    ->on(new Login)
                    ->type('email', 'jbkFrankie2@email.com')
                    ->type('password', 'password')
                    ->pause(2000)
                    ->click('@login-btn')
                    ->pause(2000)
                    ->on(new Home)
                    ->pause(2000)
                    ->click('@friends-dropdown-toggle')
                    ->pause(2000)
                    ->click('#bs-example-navbar-collapse-1 > div.col-md-offset-1 > ul > li.dropdown.open > ul > li:nth-child(2) > a > div > div > h4')
                    ->pause(2000)
                    ->mouseover('#tile0 > div.flipper > a > div.tile-front.front > img')
                    ->pause(2000)
                    ->mouseover('#tile1 > div.flipper > a > div.tile-front.front > img')
                    ->pause(2000)
                    ->mouseover('#tile2 > div.flipper > a > div.tile-front.front > img')
                    ->pause(2000)
                    ->click('#tile1 > div.flipper > a > div.tile-front.front > img ')
                    ->pause(2000)
                    ->mouseover('div.featherlight-content div.flip-container')
                    ->pause(2000)
                    ->click('div.featherlight-content div.flip-container div.flipper div.back .btn');
        });
    }
}
