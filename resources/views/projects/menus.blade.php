@php
$menus = [
    ['id' => 'about', 'name' => __('projects.menus.about'), 'url' => route('projects.show', [$project])],
    ['id' => 'issues', 'name' => __('projects.menus.issues'), 'url' => route('projects.issues.index', [$project])],
];
@endphp
<ul class="nav nav-tabs card-header-tabs">
    @foreach($menus as $menu)
    <li class="nav-item"><a href="{{ $menu['url'] }}" class="nav-link {{ isset($active) && $active == $menu['id'] ? 'active' :'' }}">{{ $menu['name'] }}</a></li>
    @endforeach
</ul>
