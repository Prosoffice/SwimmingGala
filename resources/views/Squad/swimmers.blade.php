@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">{{ $squad?->name }}</h3>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Sex</th>
                                    <th>Phone number</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($swimmers as $s )
                                    <tr class="tr-shadow">
                                        <td><span class="block-email">{{ $s?->user?->first_name }} {{ $s?->user?->last_name }}</span></td>
                                        <td>
                                            {{ $s?->user?->sex }}
                                        </td>
                                        <td>
                                            {{ $s?->user?->phone_number }}
                                        </td>
                                        <td>
                                            {{ $s?->user?->email }}
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