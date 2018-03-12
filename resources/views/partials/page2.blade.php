
<div class="container-fluid">
  <div id="stuff" class="tile-container">
    <h2>hello</h2>
    @for($i = 0; $i < count($games); $i++)
    @component('partials.item', ["game"=>$games[$i]])
    @endcomponent
    @endfor
  </div>
</div>
