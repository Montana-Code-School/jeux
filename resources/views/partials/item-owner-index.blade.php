<div class="item-owner-container">
  <div class="item-owner-content">
    <h4><strong>Borrow from Friends</strong></h4>
  </div>
  <div class="item-owner-list">
    @isset($owners)
      @if(sizeof($owners) > 0)
        @foreach($owners as $owner)
          @component('partials.item-owner', ['owner'=>$owner, 'game_id' => $game_id])
          @endcomponent
        @endforeach
      @else
        <h3>No friends own this game</h3>
      @endif
    @endisset
  </div>
</div>
