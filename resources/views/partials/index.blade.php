<div class="tile-container">
  @foreach($games as $game)
  @component('partials.item', ['game'=>$game])
  @endcomponent
  @endforeach
</div>
