<div id="tile{{ $index }}" class="tile flip-container">
  <div class="flipper">
    <div class="tile-front front">
      <img src="{{ $game['image'] }}" alt="{{ $game['name'] }}"/>
    </div>
    <div class="tile-back back">
      <a href="#" data-featherlight="#mylightbox">
        <h4>{{ $game['name'] }}</h4>
        <p>Age: {{ $game['min_age'] }}</p>
        <p>Time: 30-45 mins</p>
        <p>Players: 2</p>
      </a>
    </div>
  </div>
</div>
