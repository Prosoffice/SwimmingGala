@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">All parents</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <a href="{{ URL::TO("admin/create-parent") }}" class="au-btn au-btn-icon au-btn--green au-btn--small">   
                            <i class="zmdi zmdi-plus"></i>add parent</a>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Swimmer </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parents as $p )
                                    <tr class="tr-shadow">
                                        <td>{{ $p->first_name }} {{ $p->last_name }}</td>
                                        <td>
                                            <span class="block-email">{{ $p->email }}</span>
                                        </td>
                                        <td>
                                            {{ $p->swimmer?->user?->first_name }} {{ $p->swimmer?->user?->last_name }}
                                        </td>
                                        <td class="desc"><a href="{{ URL::TO("admin/create-parent") }}?parent_id={{ $p->id }}">Edit</a></td>
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