@extends('layouts.app')

@section('title')
    {{ $issue->id ? __('projects.edit_issue', ['title' => $issue->title]) : __('projects.new_issue_for_project', ['project' => $project->name]) }}
@endsection

@section('content')
    <div class="container">
        <h2>@yield('title')</h2>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ $issue->id ? route('projects.issues.update', [$project, $issue]) : route('projects.issues.store', [$project]) }}" method="post">
                            @csrf
                            @if($issue->id) @method('put') @endif

                            @include('includes.errors')

                            <div class="form-group">
                                <label>{{ __('projects.form.issues.title') }}</label>
                                <input type="text" class="form-control" name="title" value="{{ $issue->title }}">
                            </div>

                            <div class="form-group">
                                <label>{{ __('projects.form.issues.description') }}</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $issue->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('actions.submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

