<div class="tile-container">
  @foreach($games as $indexKey => $game)
  @component('partials.item', ['index'=>$indexKey,'game'=>$game])
  @endcomponent
  @endforeach
</div>
