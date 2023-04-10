@extends('layouts.app')
@section('content')
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">Account</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">{{ $parentId?'Edit':'Add' }} Parent</h3>
                </div>
                <hr>
                <form action="{{ URL::TO("admin/create-parent-action") }}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Choose a swimmer</label>
                        <select required class="form-control" value="{{ $parent?->swimmer->id }}" name="swimmer_id">
                            @foreach ($swimmers as $s )
                                <option value="{{ $s->id }}"  {{ $s?->id == $parent?->swimmer->id ? 'selected' : '' }}>{{ $s->user->first_name }} {{ $s->user->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" value="{{ $parentId }}" name="parent_id" />
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">First Name</label>
                        <input name="first_name" type="text" class="form-control" required value="{{ $parent?->first_name }}">
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Last Name</label>
                        <input name="last_name" type="text" class="form-control" required value="{{ $parent?->last_name }}">
                    </div>


                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Email</label>
                        <input {{ $parentId?'disabled':null }} name="email" type="text" class="form-control" required value="{{ $parent?->email }}">
                    </div>

                    @if(!$parentId)
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
