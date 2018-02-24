<ul class="dropdown-menu dropdown-menu-right notification-drop" aria-labelledby="dropdownMenu1">
  <li class="dropdown-header jeux-dropdown-header">Friends</li>
  @for ($i = 0; $i < 15; $i++)
    <li>
      @component("partials.profile")
      @endcomponent
    </li>
  @endfor
</ul>
