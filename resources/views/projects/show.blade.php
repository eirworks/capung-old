@extends('layouts.app')

@section('title')
    {{ $project->name }}
@endsection

@section('content')
    <div class="container">

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('capung.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">{{ __('projects.projects') }}</a></li>
            <li class="breadcrumb-item">@yield('title')</li>
        </ul>

        <h2>@yield('title')</h2>

        <div class="my-2 text-muted small">
            <x-public-project-label project="{{ $project->public }}" />
            {{ __('data.created_at') }} {{ \Illuminate\Support\Carbon::simpleDatetime($project->created_at) }}
            by
            {{ $project->user->name }}
        </div>

        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('projects.menus.settings') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('projects.menus.reports') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('projects.menus.forms') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('projects.menus.members') }}</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        {{ $project->description }}
                    </div>
                    <div class="card-footer">
                        <span class="d-inline-block mr-3">
                            {{ __('projects.issues') }}: {{ $project->issues_count ?? '-' }}
                        </span>
                        <span class="d-inline-block mr-3">
                            {{ __('projects.reports') }}: {{ $project->reports_count ?? '-' }}
                        </span>
                    </div>
                </div>

                <div class="my-3">
                    <a class="btn btn-outline-primary" href="{{ route('projects.issues.create', [$project]) }}">{{ __('projects.new_issue') }}</a>
                </div>
                <div class="my-3">
                    <div class="list-group">
                        @foreach($project->issues as $issue)
                        <div class="list-group-item">
                            <div>
                                <span class="font-weight-bold mr-1"><a href="#">{{ $issue->title }}</a></span>
                            </div>
                            <div>
                                <span class="text-muted small mr-1">{{ $issue->user->name }}</span>
                                <span class="text-muted small mr-1">{{ rand(1, 9) }} replies</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

