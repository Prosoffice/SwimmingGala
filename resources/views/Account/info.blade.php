@extends('layouts.app')
@section('content')
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">Account</div>
            <div class="card-body">
                
                <p>First name : {{ $user->first_name }}</p><br>

                <p> Last Name: {{ $user->last_name }}</p><br>

                <p>Email : {{ $user->email }}</p>

        

                
            </div>
        </div>
    </div>
@endsection
