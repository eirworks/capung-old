@extends('layouts.app')

@section('title')
    {{ $project->id ? __('projects.edit_project', ['title' => $project->title]) : __('projects.new_project') }}
@endsection

@section('content')

    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('capung.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">{{ __('projects.projects') }}</a></li>
            <li class="breadcrumb-item">@yield('title')</li>
        </ul>

        <h2 class="text-center">@yield('title')</h2>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-3">
                    <div class="card-body">

                        <form
                            action="{{ $project->id ? route('projects.update', [$project]) : route('projects.store') }}"
                            method="post"
                        >
                            @csrf
                            @if($project->id) @method('put') @endif
                            @include('includes.errors')

                            <div class="form-group">
                                <label>{{ __('projects.form.projects.name') }}</label>
                                <input type="text" name="title" class="form-control" value="{{ $project->title }}">
                            </div>

                            <div class="form-group">
                                <label>{{ __('projects.form.projects.description') }}</label>
                                <textarea name="description" class="form-control" rows="10">{{ $project->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="public">
                                    <label class="form-check-label" for="public">{{ __('projects.form.projects.public_label') }}</label>
                                    <div class="text-muted">
                                        {{ __('projects.form.projects.public_hint') }}
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('actions.submit') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

