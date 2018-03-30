<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;
use Tests\Browser\Components\Navbar;

class Home extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/home';
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
                ->assertSee('My Games')
                ->assertSee('Browse')
                ->assertSee('Options')
                ->assertSee('Browse')
                ->assertInputValue('@search-games-input', '')
                
                ->assertVisible('@search-games-submit')
                ->assertVisible('@friends-dropdown-list')
                ->assertVisible('@dropdown-notify-content')
                ->assertVisible('@user-dropdown')
                ->assertVisible('@filter')
                ->assertVisible('@age-slider')
                ->assertVisible('@players-slider')
                ->assertVisible('@Play-time-drop-down')
                ->assertVisible('@genre-button')
                ->assertVisible('@add-game-button')
                ->assertVisible('@filter-submit');

    }

    /**->assertValue('h2', 'My Games')
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
