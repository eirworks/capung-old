@extends('layouts.app')

@section('title')
    {{ $issue->title }}
@endsection

@section('content')
    <div class="container">
        <h3>@yield('title')</h3>
        <div class="card my-3">
            <div class="card-body">
                <div class="text-muted">
                    @if($issue->closed)
                        <span class="badge badge-primary mr-md-2">{{ __('projects.closed') }}</span>
                    @endif
                    <span class="mr-md-2">
                        <a href="{{ route('projects.show', [$project]) }}">{{ $project->name }}</a>
                    </span>
                    <span class="mr-md-2">
                        {{ __('data.id') }}
                        #{{ $issue->id }}
                    </span>
                    <span class="mr-md-2">
                        {{ \Illuminate\Support\Carbon::simpleDatetime($issue->created_at) }}
                    </span>
                    <span class="mr-md-2">
                        {{ __('projects.reported_by', ['name' => $issue->reporter]) }}
                    </span>
                        <span class="mr-md-2">
                        {{ __('projects.comments_count', ['count' => $issue->comments_count ]) }}
                    </span>
                </div>
                <div class="my-3">
                    {{ $issue->description }}
                </div>
            </div>
        </div>

        @auth
            <div class="my-1">
                <div class="btn-group">
                    <a href="#" class="btn btn-primary">{{ __('actions.reply') }}</a>
                    <button class="btn btn-outline-primary" form="toggle-issue">{{ __('actions.'.($issue->closed ? 'reopen_issue' : 'close_issue')) }}</button>
                </div>
            </div>
            <form id="toggle-issue" action="{{ route('projects.issues.toggle', [$project, $issue]) }}" method="post">
                @csrf
                @method('put')
            </form>
        @endauth

        @foreach($comments as $comment)
            <div class="card my-3">
                <div class="card-body">
                    <div class="text-muted small">
                        #{{ $comment->id }}
                        <span class="mr-2">{{ $comment->user->name }}</span>
                        <span class="mr-2">{{ \Carbon\Carbon::parse($comment->created_at)->ago() }}</span>
                    </div>
                    {{ $comment->content }}
                </div>
            </div>
        @endforeach
    </div>
@endsection

