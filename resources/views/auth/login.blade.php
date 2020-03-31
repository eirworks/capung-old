@extends('layouts.app')

@section('title')
    {{ __('auth.login') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 pt-5">

                <h2 class="text-center">{{ __('auth.login') }}</h2>

                <form action="{{ route('login.submit') }}" method="post">
                    @csrf

                    <div class="card">
                        <div class="card-body">


                            <div class="form-group">
                                <label>{{ __('auth.email') }}</label>
                                <input type="email" class="form-control" name="email">
                            </div>


                            <div class="form-group">
                                <label>{{ __('auth.password') }}</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="mt-3 text-center">
                                <button class="btn btn-primary">{{ __('auth.login') }}</button>
                                <a href="{{ route('home') }}" class="btn btn-link">{{ __('actions.cancel') }}</a>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

