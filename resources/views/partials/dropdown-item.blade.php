@if($friend_list)
  <a class href="{{ route('profile', $item->title) }}">
@endif
<div class="dropdown-item-content">
  <img src= "{{ $item->image_url }}" alt="example Avatar" />
  <div class="dropdown-item-info">
    <h4>{{$item->title}}</h4>
    <span>{{$item->description}}</span>
  </div>
  @if(isset($item->actions))
    @foreach($item->actions as $action)
    {{-- <!-- you will create a link here -->
    <!-- <a href="{{$action['controllerRoute']}}"></a> -->
    <!-- 1. find out where controller route is to accept or deny -->
    <!-- put controller route in service provider to trigger correct route -->
    --}}
      <a class="btn btn-default" href='{{$action['url']}}'>
        <span class="glyphicon {{$action['glyphicon']}}"></span>
      </a>
      
    @endforeach
  @endif
</div>
@if($friend_list)
  </a>
@endif
