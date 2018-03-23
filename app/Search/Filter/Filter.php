<?php
namespace App\Search\Filters;
use App\Game;
interface Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Game $game, $value);
}
