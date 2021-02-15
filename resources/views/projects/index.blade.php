@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container">

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('capung.dashboard') }}</a></li>
            <li class="breadcrumb-item">@yield('title')</li>
        </ul>

        <h2>@yield('title')</h2>

        <div class="my-3">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">{{ __('projects.new_project') }}</a>
        </div>

        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4 my-3">
                    <div class="card">
                        <div class="card-header"><a href="{{ route('projects.show', [$project]) }}">{{ $project->name }}</a> <x-public-project-label project="{{ $project->public }}" /></div>
                        <div class="card-body">
                            <div>{{ $project->user->name }}</div>
                            <div>{{ __('projects.issues') }}: {{ $project->issues_count }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

