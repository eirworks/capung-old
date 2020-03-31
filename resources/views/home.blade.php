@extends('layouts.app')

@section('title', __('pages.landing_title', ['app_name' => env('APP_NAME')]))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="landing-title my-5">{{ env('APP_NAME') }}</h1>
                <h3 class="landing-subtitle my-5">
                    {{ env('APP_SUBTITLE') }}
                </h3>
                @guest
                <div class="my-5 text-center">
                    <nav>
                        <div class="btn-group justify-content-center">
                            <a href="{{ route('login') }}" class="btn btn-link">{{ __('auth.login') }}</a>
                            <a href="/register" class="btn btn-link">{{ __('auth.register') }}</a>
                        </div>
                    </nav>
                </div>
                @endguest
            </div>
        </div>
    </div>
@endsection
