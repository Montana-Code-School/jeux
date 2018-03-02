<div class="tile-container">
  <!--
    Need to add jquery and jquery flip
    Need to loop through each game and create a tile for each.
  -->
  @for($i = 0; $i < 8; $i++)
  <div class="tile">
    <a href="#" data-featherlight="#mylightbox">
      <div class="tile-front">
        <img src="{{ asset('images/gameAvatar.jpg') }}" alt="monopoly"/>
      </div>
      <div class="tile-back">
        <h4>Monopoly</h4>
        <p>Age: 12+</p>
        <p>
          Time: 30-45 mins
        </p>
        <p>
          Players: 2-6
        </p>
      </div>
    </a>
  </div>
  @endfor


  <div class="lightbox" id="mylightbox">
    @component('partials.game')
    @endcomponent
  </div>
</div>
