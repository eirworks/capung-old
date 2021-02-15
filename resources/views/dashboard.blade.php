@extends('layouts.app')

@section('title')
    {{ __('capung.dashboard') }}
@endsection

@section('content')
    <div class="container">

        <div class="row my-3">
            <div class="col-md-4">
                <div class="mb-2">
                    <div class="btn-group">
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">{{ __('projects.new_project') }}</a>
                    </div>
                </div>
                <div class="list-group">
                    @foreach($projects as $project)
                        <a class="list-group-item list-group-item-action" href="{{ route('projects.show', [$project]) }}">{{ $project->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

