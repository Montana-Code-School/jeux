<div class="tile-container">
  @isset($games)
    @if(count($games) > 0)
      @foreach($games as $indexKey => $game)
        @component('partials.item', ['index'=>$indexKey,'game'=>$game])
        @endcomponent
      @endforeach
    @else
      <p class="lead">No Games to Display</p>
    @endif
  @endisset
  @empty($games)
    <p class="lead">Games Undefined</p>
  @endempty
</div>
{{ $games->links() }}
