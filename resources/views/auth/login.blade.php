@extends('layouts.login')

@section('content')
    <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
    </div>
    <div class="col bg-white p-5 rounded-end">
        <div class="text-end">
            <img src="{{ asset('storage/img/logo.png') }}" width="48" alt="">
        </div>
        <h2 class="fw-blod text-center py-5">Bienvenido</h2>
        <!-- login -->

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label for="connected" class="form3-check-label">Mantenerme connectado</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </div>
            <div class="my-3">
                <span>No tienes cuenta? <a href="{{ route('register') }}">Registrate</a></span> <br>
                <span><a href="{{ route('password.request') }}">Recuperar Password</a></span>
            </div>
        </form>
    </div>
@endsection
