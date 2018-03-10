<div id="tile{{ $index }}" class="tile flip-container">
  <div class="flipper">
    <div class="tile-front front">
      <img src="{{ $game['image'] }}" alt="{{ $game['name'] }}"/>
    </div>
    <div class="tile-back back">
      <a href="#" data-featherlight="#lb{{ $index }}">
        <h4>{{ $game['name'] }}</h4>
        <p>Age: {{ $game['min_age'] }}</p>
        <p>Time: {{$game['min_play']}}-{{$game['max_play']}} mins</p>
        <p>Players: {{$game['min_player']}}</p>
      </a>
    </div>
  </div>
  <div id="lb{{ $index }}" class="item-full">
    <div class="item-content">
      <img src="{{ asset('images/gameAvatar.jpg')}}" alt="game"></img>
      <div class="item-info">
        <h4>description</h4>
        <p>This is a description of the game blah lahbah. You will lose because pandemic hates you. This is a description of the game blah lahbah. You will lose because pandemic hates you. This is a description of the game blah lahbah. You will lose because pandemic hates you. </p>
        <h5>Players</h5>
        <p>12</p>
        <h5>Age</h5>
        <p>12+</p>
        <h5>Play Time</h5>
        <p>15-30mins</p>
      </div>
    </div>
  </div>
</div>
