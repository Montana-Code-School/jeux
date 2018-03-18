<div class="item-owner flip-container">
  <div class="flipper">
    <div class="front">
      <img src="{{ asset( "images/" . $owner['image'] ) }}"></img>
    </div>
    <div class="back">
      {!! Form::open(['action'=>['UserController@borrowGame', 'game_id' => $game_id, 'owner_id' => $owner['id']]]) !!}
      {!! Form::button('Borrow Game', ['type' => 'submit', 'class' => "btn btn-primary"]) !!}
      {!! Form::close() !!}
    </div>
  </div>
</div>
