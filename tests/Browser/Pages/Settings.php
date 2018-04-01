<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Settings extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/settings';
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
  //testing the navBar
                ->assertSee('My Games')
                ->assertSee('Browse')
                ->assertInputValue('@search-games-input', '')
                ->assertVisible('@search-games-submit')
                ->assertVisible('@friends-dropdown-list')
                ->assertVisible('@dropdown-notify-content')
                ->assertVisible('@friends-dropdown-toggle')
                ->assertVisible('@dropdown-notify-toggle')
                ->assertVisible('@user-dropdown-toggle')
                ->click('@user-dropdown-toggle')
                ->assertVisible('@user-profile')
                ->assertVisible('@user-settings')
                ->assertVisible('@user-logout')
//testing the elements on Settings
                ->assertSee('Settings')
                ->assertVisible('@update-name-label')
                ->assertInputValue('#name', 'Jill Ben Kendra-Frank')
                ->assertVisible('@update-username-label')
                ->assertInputValue('@update-username-input', 'Frankie1')
                ->assertVisible('@update-email-label')
                ->assertInputValue('@update-email-input', 'jbkFrankie1@email.com')
                ->assertVisible('@update-change-label')
                ->assertVisible('@update-confirm-label')
                ->assertVisible('@update-profile-pic-label')
                ->assertVisible('@update-profile-pic')
                ->assertVisible('@update-button');
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
