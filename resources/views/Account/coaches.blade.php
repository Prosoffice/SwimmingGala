@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">All Coaches</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <a href="{{ URL::TO("admin/create-coach") }}" class="au-btn au-btn-icon au-btn--green au-btn--small">   
                            <i class="zmdi zmdi-plus"></i>add coach</a>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Squad </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coaches as $c )
                                    <tr class="tr-shadow">
                                        <td>{{ $c->first_name }} {{ $c->last_name }}</td>
                                        <td>
                                            <span class="block-email">{{ $c->email }}</span>
                                        </td>
                                        <td>
                                            {{ $c->squad?->name }}
                                        </td>
                                        <td class="desc"><a href="{{ URL::TO("admin/create-coach") }}?coach_id={{ $c->id }}">Edit</a></td>
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