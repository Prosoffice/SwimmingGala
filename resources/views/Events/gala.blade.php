@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">All Galas</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            @if(auth()->user()->role_id==1)
                                <a href="{{ URL::TO("add-gala") }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>add gala</a>
                            @endif
                            
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Gala name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galas as $g )
                                    <tr class="tr-shadow">
                                        <td>{{ $g->gala_name }}</td>
                                        <td>
                                            <span class="block-email">{{ $g->start_date }}</span>
                                        </td>
                                        <td>
                                            <span class="block-email">{{ $g->end_date }}</span>
                                        </td>
                                        <td class="desc">
                                            @if(auth()->user()->role_id==1)
                                            <a href="{{ URL::TO("add-gala") }}?gala_id={{ $g->id }}">Edit</a>
                                            @endif
                                        </td>
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