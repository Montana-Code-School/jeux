<ul class="dropdown-menu notification-drop" aria-labelledby="dropdownMenu1">
  <li class="dropdown-header">Friends</li>
  @for ($i = 0; $i < 6; $i++)
    <li>
      @component("partials.profile")
      @endcomponent
    </li>
  @endfor
</ul>
