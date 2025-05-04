<ul class="nav flex-column">
    @php
        $menus = auth()->user()->roles->flatMap->menus->unique('id');
    @endphp

    @foreach($menus as $menu)
        <li class="nav-item">
            <a class="nav-link" href="{{ route($menu->route) }}">{{ $menu->name }}</a>
        </li>
    @endforeach
</ul>
