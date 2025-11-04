@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<div class="d-flex justify-content-center align-items-center">
<div class="reset-card">
    <!-- Título dentro del card -->
    <div class="reset-title">{{ __('Reset Password') }}</div>

    <div class="card-body p-0">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" 
                       required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-orange px-4 py-2">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
