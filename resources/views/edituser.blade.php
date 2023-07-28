@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <form action="/update/{id}" method="POST" class="mt-3" enctype="multipart/form-data">
                    @csrf
                    @foreach ($edit as $edits)
                        <div class="card">
                            <div class="card-header">{{ __('Edit Employee Details ') }}</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input id="id" type="hidden"
                                                class="form-control @error('id') is-invalid @enderror" name="id"
                                                value="{{ $edits->id }}" autocomplete="firstname" autofocus>

                                            @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="firstname"
                                            class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="firstname" type="text"
                                                class="form-control @error('firstname') is-invalid @enderror"
                                                name="firstname" value="{{ $edits->firstname }}" required
                                                autocomplete="firstname" autofocus>

                                            @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="lastname" type="text"
                                                class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                                value="{{ $edits->lastname }}" required autocomplete="lastname" autofocus>

                                            @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Father Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="fathername" type="text"
                                                class="form-control @error('fathername') is-invalid @enderror"
                                                name="fathername" value="{{ $edits->fathername }}" required
                                                autocomplete="fathername" autofocus>

                                            @error('fathername')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $edits->email }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="address"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="address" type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                value="{{ $edits->address }}" required autocomplete="address">

                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="mobile"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>

                                        <div class="col-md-6">
                                            <input id="mobile" type="text"
                                                class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                                value="{{ $edits->mobile }}" required autocomplete="mobile">

                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                        <div class="col-md-6">
                                            <input id="description" type="text"
                                                class="form-control @error('description') is-invalid @enderror"
                                                name="description" value="{{ $edits->description }}" required
                                                autocomplete="description">

                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="image"
                                            class="col-md-4 col-form-label text-md-end">{{ __(' Current Image:') }}</label>
                                        <div class="col-md-6">
                                            <img src="{{ url('images/' . explode(',', $edits->image)[0]) }}"
                                                class="rounded-0 border border-secondary" width="70px">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="image"
                                            class="col-md-4 col-form-label text-md-end">{{ __(' New Image:') }}</label>
                                        <div class="col-md-6">
                                            <input id="image" type="file" class="form-control" name="image[]"
                                                value="{{ $edits->image }}" autocomplete="image" multiple>
                                            <input id="image" type="hidden" class="form-control" name="image[]"
                                                value="{{ $edits->image }}" autocomplete="image" multiple>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </form>

            </div>
        </div>
    </div>
@endsection
