@if($friend_list)
  <a class href="{{ route('profile', $item->title) }}">
@endif
<div class="dropdown-item-content">
  <img src= "{{ asset( "images/uploads/profile/" . $item->image) }}" alt="example Avatar" />
  <div class="dropdown-item-info">
    <h4>{{$item->title}}</h4>
    <span>{{$item->description}}</span>
  </div>
  @if(isset($item->actions))
    @foreach($item->actions as $action)
      <button type="button" class="btn btn-default">
        <span class="glyphicon {{$action['glyphicon']}}"></span>
      </button>
    @endforeach
  @endif
</div>
@if($friend_list)
  </a>
@endif

<!-- <li>
  <div>
    <img src="http://loremflickr.com/50/50"> <strong>Bob</strong> wants to borrow: <span> PANDEMIC LEGACY </span>
    <button class="btn btn-default" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    </button>
    <button class="btn btn-default" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    </button>
  </div>
</li> -->
