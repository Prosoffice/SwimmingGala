@extends('layouts.authApp')
@section('content')
    <div class="login-form">
        <form action="{{URL::TO("/register-action")}}" method="post">
            @csrf

            <div class="form-group">
                <label>First Name</label>
                <input class="au-input au-input--full" type="text" name="first_name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input class="au-input au-input--full" type="text" name="last_name">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input class="au-input au-input--full" type="email" name="email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="au-input au-input--full" type="password" name="password">
            </div>
            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
        </form>
        <div class="register-link">
            <p>
                Already have account?
                <a href="/login">Sign In</a>
            </p>
        </div>
    </div>
@endsection
