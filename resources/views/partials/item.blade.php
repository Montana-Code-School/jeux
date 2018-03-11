<div id="tile{{ $index }}" class="tile flip-container">
  <div class="flipper">
    <a href="#" data-featherlight="#lb{{ $index }}">
      <div class="tile-front front">
        <img src="{{ $game['image'] }}" alt="{{ $game['name'] }}"/>
      </div>
      <div class="tile-back back">
        <h4>{{ $game['name'] }}</h4>
        @if($game['min_player'] === $game['max_player'])
          <p>Players: {{ $game['max_player'] }}</p>
        @else
          <p>Players: {{ $game['min_player'] }}-{{ $game['max_player'] }}</p>
        @endif
        <p>Age: {{ $game['min_age'] }}</p>
        @if($game['min_play'] === $game['max_play'])
          <p>Time: {{ $game['max_play'] }} mins</p>
        @else
          <p>Time: {{ $game['min_play'] }}-{{ $game['max_play'] }} mins</p>
        @endif
      </div>
    </a>
  </div>
  @component('partials.item-full', ['index'=>$index, 'game'=>$game])
  @endcomponent
</div>
