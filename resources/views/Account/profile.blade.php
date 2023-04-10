@extends('layouts.app')
@section('content')
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">Account</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Personal Info</h3>
                </div>
                <hr>
                <form action="{{ URL::TO("update-information-action") }}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">First Name</label>
                        <input name="first_name" type="text" class="form-control" required value="{{ $user->first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Last Name</label>
                        <input name="last_name" type="text" class="form-control" required value="{{ $user->last_name }}">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Email</label>
                        <input disabled name="email" type="text" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Phone Number</label>
                        <input name="phone_number" type="text" class="form-control" required value="{{ $user->phone_number }}">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Date of birth</label>
                        <input name="date_of_birth" type="date" class="form-control" disabled required value="{{ $user->date_of_birth }}">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Address</label>
                        <input name="address" type="text" class="form-control" required value="{{ $user->address }}">
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Select Sex</label>
                        <select required class="form-control" value="{{ $user->sex }}" name="sex" {{ $user->sex ? 'disabled' : '' }}>
                            <option value="Male" {{ $user->sex == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $user?->sex == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Choose your Squad</label>
                        <select required class="form-control" value="{{ $swimmer?->squad_id }}" name="squad_id" {{ $swimmer?->squad_id ? 'disabled' : '' }}>
                            @foreach ($squads as $squad )
                                <option value="{{ $squad->id }}"  {{ $squad?->id == $swimmer?->squad_id ? 'selected' : '' }}>{{ $squad->name }}</option>
                            @endforeach
                        </select>
                    </div>
            
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