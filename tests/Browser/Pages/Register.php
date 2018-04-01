<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;
use Tests\Browser\Components\Navbar;

class Register extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/register';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
                ->assertSee('Register')
                ->assertSee('Name')
                ->assertInputValue('#name', '')
                ->assertSee('Username')
                ->assertInputValue('#username', '')
                ->assertSee('E-Mail Address')
                ->assertInputValue('#email', '')
                ->assertSee('Password')
                ->assertInputValue('#password', '')
                ->assertSee('Confirm Password')
                ->assertInputValue('#password-confirm', '')
                ->assertSeeIn('.btn', 'Register');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
