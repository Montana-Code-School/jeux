<div class="item-owner flip-container">
  <div class="flipper">
    <div class="front">
      <img src="{{ asset( "images/" . $owner['image'] ) }}"></img>
    </div>
    <div class="back">
      <p>{{ $owner['username'] }}</p>
      <button>Borrow</button>
    </div>
  </div>
</div>
