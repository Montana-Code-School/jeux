<div id="lb{{ $index }}" class="item-full">
  <div class="item-content">
    <img src="{{ asset('images/gameAvatar.jpg')}}" alt="game"></img>
    <div class="item-info">
      <h4><strong>description</strong></h4>
      <p>{{ $game['description']}}</p>
      <h5><strong>Players</strong></h5>
      @if($game['min_player'] === $game['max_player'])
        <p>{{ $game['max_player'] }}</p>
      @else
        <p>{{ $game['min_player'] }}-{{ $game['max_player'] }}</p>
      @endif
      <h5><strong>Age</strong></h5>
      <p>{{ $game['min_age']}}+</p>
      <h5><strong>Play Time</strong></h5>
      @if($game['min_play'] === $game['max_play'])
        <p>{{ $game['max_play'] }} minutes</p>
      @else
        <p>{{ $game['min_play'] }}-{{ $game['max_play'] }} minutes</p>
      @endif
    </div>
    <div class="add-item-inventory">
      Add to collection
    </div>
  </div>
  <div class="owner-container">
    <h4><strong>Borrow from Friends</strong><h4>
    <div class="owner-list">
      <div class="item-owner">
        <img src="{{asset('images/avatar.png')}}"></img>
        <p>Username</p>
        <div class="borrow-item">
          +
        </div>
      </div>
    </div>
  </div>
</div>
