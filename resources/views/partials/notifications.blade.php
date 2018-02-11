<ul class="dropdown-menu notification-drop" aria-labelledby="dropdownMenu2">
  <li class="dropdown-header">Notifications</li>
  @for ($i = 0; $i < 6; $i++)
    @component("partials.notification")
    @endcomponent
  @endfor
</ul>
