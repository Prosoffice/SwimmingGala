@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Events</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            @if(auth()->user()->role_id==1 || auth()->user()->role_id==4)
                            <a href="{{ URL::TO("add-event") }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>add event
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Squad</th>
                                    <th>Distance</th>
                                    <th>Stroke</th>
                                    <th>Gala</th>
                                    <th>Swimmer</th>
                                    <th>Finish Time</th>
                                    <th>Event Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $g )
                                    <tr class="tr-shadow">
                                        <td>{{ $g->squad->name }}</td>
                                        <td>
                                            <span class="block-email">{{ $g->distance }}</span>
                                        </td>
                                        <td>
                                            {{ $g?->stroke?->name }}
                                        </td>

                                        <td>
                                            {{ $g?->gala?->gala_name }}</span>
                                        </td>
                                        <td>
                                            <span class="block-email">{{ $g->swimmer?->user?->first_name }} {{ $g->swimmer?->user?->last_name }}</span>
                                        </td>
                                        <td>
                                            {{ $g->finish_time }}
                                        </td>
                                        <td>{{ $g->event_type }}</td>
                                    </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection