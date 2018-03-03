<ul class="dropdown-menu notification-drop" aria-labelledby="dropdownMenu1">
  <li class="dropdown-header">List Heading</li>
  @for ($i = 0; $i < 6; $i++)
    <li>
      @component("partials.dropdown-item")
      @endcomponent
    </li>
  @endfor
</ul>
