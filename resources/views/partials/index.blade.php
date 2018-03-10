
<div class="container-fluid">
  <div class="tile-container">
    @for($i = 0; $i < count($games); $i++)
    @component('partials.item', ["game"=>$games[$i]])
    @endcomponent
    @endfor
  </div>
</div>
