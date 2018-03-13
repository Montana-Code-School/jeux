
<div class="user-profile-container">
  <div class="user-profile">
    <img src="{{ asset( "images/" . $user['image'] ) }}" alt="example Avatar" />
    <div class="user-info">
      <h4>{{ $user['username'] }}</h4>
      <span>
        Borrowing: 2 Games
      </span>
      <span>
        Lending: 1 Game
      </span>
    </div>
    @if(!$user['is_friend'])
      <div>
        <span class="glyphicon glyphicon-plus"></span>
      </div>
    @endif
  </div>
</div>
