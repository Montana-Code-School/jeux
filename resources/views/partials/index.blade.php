<div class="tile-container">
  <!--
    Need to add jquery and jquery flip
    Need to loop through each game and create a tile for each.
  -->
  @for($i = 0; $i < 8; $i++)
  @component('partials.item')
  @endcomponent
  @endfor
</div>
