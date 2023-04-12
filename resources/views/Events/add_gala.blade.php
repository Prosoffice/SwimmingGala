@extends('layouts.app')
@section('content')
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">Add Gala</div>
            <div class="card-body">
               
                <hr>
                <form action="{{ URL::TO("add-gala-action") }}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Gala Name</label>
                        <input name="gala_name" type="text" class="form-control" required value="{{ $gala?->gala_name }}">
                        <input type="hidden" value="{{ $gala?->id }}" name="gala_id" />
                    </div>

                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" value={{ $gala?->start_date }} />
                    </div>

                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" value={{ $gala?->end_date }} />
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
