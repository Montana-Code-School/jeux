<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
  <li class="dropdown-header">{{$list_name}}</li>
  @for ($i = 0; $i < count($items); $i++)
    <li class="dropdown-item">
      @component("partials.dropdown-item",["item"=>(object)$items[$i], "friend_list"=>$friend_list])

      @endcomponent
    </li>
  @endfor
</ul>
