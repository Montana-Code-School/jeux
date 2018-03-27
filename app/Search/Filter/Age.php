<?php

namespace App\Search\Filters;
use App\Game;


class Age implements Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Game $game, $value, $value2)
    {

        return $game->where('min_age', '=', $value && 'max_age', '=', $value2);
    }
}
