<div class="item-owner flip-container">
  <div class="flipper">
    <div class="front">
      <img src="{{ asset( "images/uploads/profile/" . $owner['image'] ) }}"></img>
    </div>
    <div class="back">
      <h4>{{ $owner['username'] }}</h4>
      @if(!$owner['currently_borrowing'])
        {!! Form::open(['action'=>['UserController@borrowGame', 'game_id' => $game_id, 'owner_id' => $owner['id']]]) !!}
        {!! Form::button('Borrow Game', ['type' => 'submit', 'class' => "btn btn-primary", 'dusk' => 'borrow-game']) !!}
        {!! Form::close() !!}
      @else
        {!! Form::open(['action'=>['UserController@returnGame', 'game_id' => $game_id, 'owner_id' => $owner['id']]]) !!}
        {!! Form::button('Return Game', ['type' => 'submit', 'class' => "btn btn-primary", 'dusk' => 'return-game']) !!}
        {!! Form::close() !!}
      @endif
    </div>
  </div>
</div>
