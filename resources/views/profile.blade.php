@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profile">
            <div class="profile-title">
                <div class="profile-title-text">
                    <h4>Личная информация</h4>
                </div>
                <div class="profile-title-icon">
                    <button class="btn">
                        <span class="material-symbols-outlined">edit</span>
                    </button>
                </div>
            </div>
            <div class="profile-form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <div class="col-md-12">
                            <span class="mb-1">Name:</span>
                            <input id="name"
                                   type="text"
                                   value="{{$user->name}}"
                                   disabled
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}"
                                   required autocomplete="name"
                                   autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="col-md-12">
                            <span class="mb-1">Email:</span>
                            <input id="email"
                                   type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   value="{{$user->email}}"
                                   disabled
                                   required
                                   autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success custom-btn login-register-btn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
