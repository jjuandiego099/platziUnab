@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <div class="d-flex justify-content-center align-items-center">
        <div class="register-card">
            <!-- Título dentro del card -->
            <div class="register-title">{{ __('Register') }}</div>

            <div class="card-body p-0">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Tipo de usuario</label>
                        <select id="role" name="role" class="form-select" required>
                            <option value="">Selecciona una opción...</option>
                            <option value="teacher">Profesor</option>
                            <option value="student">Estudiante</option>
                        </select>
                    </div>

                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>

            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-orange px-4 py-2">{{ __('Register') }}</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
