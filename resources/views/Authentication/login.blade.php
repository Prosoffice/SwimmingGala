@extends('layouts.authApp')
@section('content')
    <div class="login-form">
        <form action="{{URL::TO("/login-action")}}" method="post">
            @csrf

            <div class="form-group">
                <label>Email Address</label>
                <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
            </div>
            <div class="login-checkbox">
                <label>
                    <input type="checkbox" name="remember">Remember Me
                </label>
                <label>
                    <a href="#">Forgotten Password?</a>
                </label>
            </div>
            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
        </form>
        <div class="register-link">
            <p>
                Don't you have account?
                <a href="/register">Sign Up Here</a>
            </p>
        </div>
    </div>
@endsection
