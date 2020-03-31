@extends('layouts.app')

@section('title')
    {{ $project->name }}
@endsection

@section('content')
    <div class="container">

        <h4><a href="{{ route('projects.show', [$project]) }}">@yield('title')</a></h4>

        <div class="my-3 card">
            <div class="card-header">
                @include('projects.menus')
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('data.id') }}</th>
                        <th>{{ __('data.title') }}</th>
                        <th>{{ __('data.created_at') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($issues->count() > 0)
                    @foreach($issues as $issue)
                        <tr>
                            <td>{{ $issue->id }}</td>
                            <td><a href="{{ route('projects.issues.show', [$project, $issue]) }}">{{ $issue->title }}</a></td>
                            <td>{{ \Illuminate\Support\Carbon::simpleDatetime($issue->created_at) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-center">
                            <a href="{{ route('projects.issues.index', [$project]) }}">{{ __('projects.view_issues') }}</a>
                        </td>
                    </tr>
                    @else
                        <tr class="text-center text-muted">{{ __('projects.messages.no_open_issues') }}</tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                {{ $project->description }}
            </div>
        </div>
    </div>
@endsection

