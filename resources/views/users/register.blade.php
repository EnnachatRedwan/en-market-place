@extends('layout')

@section('content')
    <div class="container">
        <form method="POST" action="/users" class="form">
            @csrf
            <h1>Create an <span>Account</span></h1>
            <div class="form-fields">

                <div class="form-field">
                    <label for="name">Name: <span>*</span></label>
                    <input type="text" required name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-field">
                    <label for="email">Email: <span>*</span></label>
                    <input type="email" required name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-field">
                    <label for="password">Password: <span>*</span></label>
                    <input type="password" required name="password" id="password" value="{{ old('password') }}">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-field">
                    <label for="password_confirmation">Password confirmation: <span>*</span></label>
                    <input type="password" required name="password_confirmation" id="password_confirmation"
                        value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="form-controlls">
                <button class="btn">Register</button>
            </div>
            <p class="account-form">Already have an account? <a href="/login">Login</a></p>
        </form>
    </div>
@endsection
