@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">All squads</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <a href="{{ URL::TO("squad-update") }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>add squad</a>
                            
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Squad name</th>
                                    <th>Coach name</th>
                                    <th>Swimmers</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($squads as $s )
                                    <tr class="tr-shadow">
                                        <td>{{ $s->name }}</td>
                                        <td>
                                            <span class="block-email">{{ $s->coach?->first_name }}</span>
                                        </td>
                                        <td class="desc"><a href="{{ URL::TO("squad-swimmers") }}?squad_id={{ $s->id }}">view</a></td>
                                        <td class="desc"><a href="{{ URL::TO("squad-update") }}?squad_id={{ $s->id }}">Edit</a></td>
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