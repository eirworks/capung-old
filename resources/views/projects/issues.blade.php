@extends('layouts.app')

@section('title')
    {{ __('projects.issues', ['name' => $project->name]) }}
@endsection

@section('content')
    <div class="container">

        <h4><a href="{{ route('projects.show', [$project]) }}">@yield('title')</a></h4>

        <div class="my-3 card">
            <div class="card-header">
                @include('projects.menus', ['selected' => 'issues'])
            </div>
            <div class="card-body">
                <div class="mb-1">
                    <a href="{{ route('projects.issues.create', [$project]) }}" class="btn btn-primary">{{ __('projects.new_issue') }}</a>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('data.id') }}</th>
                        <th>{{ __('data.title') }}</th>
                        <th>{{ __('data.comments') }}</th>
                        <th>{{ __('data.created_at') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($issues->count() > 0)
                        @foreach($issues as $issue)
                            <tr>
                                <td>{{ $issue->id }}</td>
                                <td>
                                    @if($issue->closed)
                                        <span class="badge badge-primary mr-md-2">{{ __('projects.closed') }}</span>
                                    @endif
                                    <a href="{{ route('projects.issues.show', [$project, $issue]) }}" class="{{ $issue->closed ? 'text-muted' : '' }}">{{ $issue->title }}</a>
                                </td>
                                <td>{{ $issue->comments_count }}</td>
                                <td>{{ \Illuminate\Support\Carbon::simpleDatetime($issue->created_at) }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center text-muted">{{ __('projects.messages.no_open_issues') }}</tr>
                    @endif
                    </tbody>
                </table>
                {!! $issues->links() !!}
            </div>
        </div>
    </div>
@endsection

