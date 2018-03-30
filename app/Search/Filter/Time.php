<?php
namespace App\Search\Filters;
use App\Game;
class Time implements Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Game $game, $value)
    {
        list($min, $max) = explode('-', $value);
        return $game->where('min_play',$min)
                    ->where('max_play',$max);
    }
}
