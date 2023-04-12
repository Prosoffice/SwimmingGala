@extends('layouts.app')
@section('content')
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">Add Event</div>
            <div class="card-body">
               
                <hr>
                <form action="{{ URL::TO("add-event-action") }}" method="post" novalidate="novalidate">
                    @csrf

                    <div class="form-group">
                        <label>Select Swimmer</label>
                        <select name="swimmer_id" class="form-control">
                            @foreach ($swimmers as $s )
                                <option value="{{ $s->id }}">{{ $s->user?->first_name }} {{ $s->user?->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Event Type </label>
                        <select name="event_type" class="form-control" required>
                            <option value="Training">Training </option>
                            <option value="Official">Official </option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Distance</label>
                        <input name="distance" type="number" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Finish Time</label>
                        <input name="finish_time" type="number" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label>Select Stroke</label>
                        <select name="stroke_id" class="form-control" required>
                            @foreach ($strokes as $s )
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Gala</label>
                        <select name="gala_id" class="form-control">
                            <option value="0">Select Gala</option>
                            @foreach ($galas as $g )
                                <option value="{{ $g->id }}">{{ $g->gala_name }}</option>
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
