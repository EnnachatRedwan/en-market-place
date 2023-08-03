@extends('layout')

@section('content')
    <div class="container">
        <form method="POST" action="/authenticate" class="form">
            @csrf
            <h1>Login to your <span>Account</span></h1>
            <div class="form-fields">

                <div class="form-field">
                    <label for="email">Email:</label>
                    <input type="email" required name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-field">
                    <label for="password">Password:</label>
                    <input type="password" required name="password" id="password" value="{{ old('password') }}">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="form-controlls">
                <button class="btn">Login</button>
            </div>
            <p class="account-form">Don't have an account? <a href="/register">Register</a></p>
        </form>
    </div>
@endsection
