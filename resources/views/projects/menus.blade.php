@php
$menus = [
    ['id' => 'about', 'name' => __('projects.menus.about'), 'url' => route('projects.show', [$project])],
    ['id' => 'issues', 'name' => __('projects.menus.issues'), 'url' => route('projects.issues.index', [$project])],
    ['id' => 'settings', 'name' => __('projects.menus.settings'), 'url' => '#'],
    ['id' => 'form', 'name' => __('projects.menus.form'), 'url' => '#'],
];
@endphp
<ul class="nav nav-tabs card-header-tabs">
    @foreach($menus as $menu)
    <li class="nav-item"><a href="{{ $menu['url'] }}" class="nav-link {{ isset($active) && $active == $menu['id'] ? 'active' :'' }}">{{ $menu['name'] }}</a></li>
    @endforeach
</ul>
