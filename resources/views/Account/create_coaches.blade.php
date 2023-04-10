@extends('layouts.app')
@section('content')
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">Account</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">{{ $coachId?'Edit':'Add' }} Coach</h3>
                </div>
                <hr>
                <form action="{{ URL::TO("admin/create-coach-action") }}" method="post" novalidate="novalidate">
                    @csrf
            
                    <input type="hidden" value="{{ $coachId }}" name="coach_id" />
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">First Name</label>
                        <input name="first_name" type="text" class="form-control" required value="{{ $coach?->first_name }}">
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Last Name</label>
                        <input name="last_name" type="text" class="form-control" required value="{{ $coach?->last_name }}">
                    </div>


                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Email</label>
                        <input {{ $coachId?'disabled':null }} name="email" type="text" class="form-control" required value="{{ $coach?->email }}">
                    </div>

                    @if(!$coachId)
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Password</label>
                            <input name="password" type="password" class="form-control" required>
                        </div>
                    @endif
                
        
                   
            
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
        
                            <span id="payment-button-amount">Submit</span>
        
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
