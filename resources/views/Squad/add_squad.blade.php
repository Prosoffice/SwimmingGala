@extends('layouts.app')
@section('content')
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">Account</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">{{ $squadId?'Edit':'Add' }} Squad</h3>
                </div>
                <hr>
                <form action="{{ URL::TO("squad-add-action") }}" method="post" novalidate="novalidate">
                    @csrf
                    <input type="hidden" value="{{ $squadId }}" name="squad_id" />
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Squad Name</label>
                        <input name="name" type="text" class="form-control" required value="{{ $squad?->name }}">
                    </div>
                    
                
        
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Choose a coach</label>
                        <select required class="form-control" value="{{ $squad?->coach_id }}" name="coach_id">
                            @foreach ($coaches as $c )
                                <option value="{{ $c->id }}"  {{ $c?->id == $squad?->coach_id ? 'selected' : '' }}>{{ $c->first_name }} {{ $c->last_name }}</option>
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
