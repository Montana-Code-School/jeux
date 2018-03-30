<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;

class Navbar extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return 'body > div.menu > nav > div > div.navbar-header';
    }

    /**
     * Assert that the browser page contains the component.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertVisible($this->selector())
                ->assertSee('Browse')
                ->assertSee('Options')
                ->assertInputValue('@search-games-input', '')
                ->assertVisible('@search-games-submit')
                ->assertVisible('@friends-dropdown-list')
                ->assertVisible('@dropdown-notify-content')
                ->assertVisible('@user-dropdown');
    }

    /**
     * Get the element shortcuts for the component.
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
