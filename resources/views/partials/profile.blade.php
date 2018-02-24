@section('profile')

<div class="user-profile">
  <img src="images/avatar.png" alt="example Avatar" />
  <div class="user-info">
    <?php var_dump($myVar->all()) ?>
    <p>
      Borrowing: 2 Games
    </p>
    <p>
      Lending: 1 Game
    </p>
  </div>
  <div>
    <span class="glyphicon glyphicon-plus"></span>
  </div>
</div>

@show
