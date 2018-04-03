<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;
use Tests\Browser\Components\Navbar;

class SearchResults extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/searchresults';
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
                ->click('@friends-dropdown-toggle')
                ->pause(2000)
                ->click('@dropdown-notify-toggle')
                ->pause(2000)
                ->click('@dropdown-notify-toggle')
                ->pause(2000)
                ->click('@user-dropdown-toggle')
                ->pause(2000)
                ->assertVisible('@user-profile')
                ->assertVisible('@user-settings')
                ->assertVisible('@user-logout')
                ->click('@user-dropdown-toggle')
        //testing the elements on Home
                ->assertSee('Search Results Page')
                // ->assertVisible('@tile-front')
                ->assertVisible('.pagination')
        //testing the elements on Filter
                ->assertSee('Options')
                ->assertVisible('@filter')
                ->assertVisible('@age-slider')
                ->assertVisible('@players-slider')
                ->assertVisible('@Play-time-drop-down')
                ->assertVisible('@genre-button')
                ->assertVisible('@add-game-button')
                ->assertVisible('@filter-submit');
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
