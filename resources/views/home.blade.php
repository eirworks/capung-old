@extends('layouts.frontend')

@section('title', __('pages.landing_title', ['app_name' => env('APP_NAME')]))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="landing-title my-5">
                    {{ __('capung.title') }}
                </h1>
                @guest
                <div class="my-5 text-center">
                    <nav>
                        <div class="btn-group justify-content-center">
                            <a href="/register" class="btn btn-outline-primary btn-lg">{{ __('auth.free_trial') }}</a>
                        </div>
                    </nav>
                </div>
                @endguest
            </div>
        </div>
    </div>
@endsection
