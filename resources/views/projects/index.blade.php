@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <h2>@yield('title')</h2>

        <div class="card">
            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('data.name') }}</th>
                        <th>{{ __('data.owner') }}</th>
                        <th>{{ __('data.issues_count') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td><a href="{{ route('projects.show', [$project]) }}">{{ $project->name }}</a></td>
                            <td>{{ $project->user->name }}</td>
                            <td>{{ $project->issues_count }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

