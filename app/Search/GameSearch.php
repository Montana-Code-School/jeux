<?php
namespace App\Search;
use App\Game;
use Illuminate\Http\Request;
class GameSearch
{
  public static function apply(Request $filters)
      {
          $game = static::applyDecoratorsFromRequest($filters, new Game);
          return $game;
      }
      private static function applyDecoratorsFromRequest(Request $request, Game $game)
      {
          foreach ($request->all() as $filterName => $value) {
              $decorator = static::createFilterDecorator($filterName);
              if (static::isValidDecorator($decorator)) {
                  $game = $decorator::apply($game, $value);
              }
          }
          return $game;
      }
      private static function createFilterDecorator($name)
      {
          return __NAMESPACE__ . '\\Filters\\' . studly_case($name);
      }
      private static function isValidDecorator($decorator)
      {
          return class_exists($decorator);
      }
      private static function getResults(Game $game)
      {
          return $game->get();
      }
}
