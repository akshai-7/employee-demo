@extends('layouts.login')

<style>
    .btn1 {
        color: white;
        text-decoration-line: none;

    }

    #message {
        position: fixed;
        top: 70px;
        right: 10px;
        animation-duration: 1s;
        z-index: 1;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Employee Register') }}</div>
                    <div class="mt-4" style="margin-left:100px">
                        <div class="message" id="message">
                            @if (session()->has('message'))
                                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                                    style="width: 300px;height:20px">
                                    <div div class="alert alert-success">
                                        <i class="fa-regular fa-circle-check"></i> {{ session('message') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="message1" id="message">
                            @if (session()->has('message1'))
                                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                                    style="width: 300px;height:20px;">
                                    <div class="alert alert-danger">
                                        <i class="fa-regular fa-circle-x"></i>{{ session('message1') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="firstname"
                                        class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="firstname" type="text"
                                            class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                            value="{{ old('firstname') }}" autocomplete="firstname" autofocus>

                                        @if ($errors->has('firstname'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="lastname" type="text"
                                            class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                            value="{{ old('lastname') }}" autocomplete="lastname" autofocus>

                                        @if ($errors->has('lastname'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Father Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="fathername" type="text"
                                            class="form-control @error('fathername') is-invalid @enderror" name="fathername"
                                            value="{{ old('fathername') }}" autocomplete="fathername" autofocus>

                                        @if ($errors->has('fathername'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('fathername') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email">

                                        @if ($errors->has('email'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" autocomplete="address">

                                        @if ($errors->has('address'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="mobile"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>

                                    <div class="col-md-6">
                                        <input id="mobile" type="text"
                                            class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                            value="{{ old('mobile') }}" autocomplete="mobile">

                                        @if ($errors->has('mobile'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="description"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                    <div class="col-md-6">
                                        <input id="description" type="text"
                                            class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ old('description') }}"
                                            autocomplete="description">

                                        @if ($errors->has('description'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file"
                                            class="form-control @error('image') is-invalid @enderror" name="image[]"
                                            value="{{ old('image') }}" autocomplete="image" multiple>

                                        @if ($errors->has('image'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="new-password">

                                        @if ($errors->has('password'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" autocomplete="new-password">

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                        {{-- <button type="submit" class="btn btn-secondary ">
                                        <a href="/" class="btn1"> {{ __('Back') }}</a>
                                    </button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
