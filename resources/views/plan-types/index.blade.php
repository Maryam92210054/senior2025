@extends('layouts.nav3')
@section('title') manage plan types @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Data Table</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ asset('css/meals.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Plan <b>Types</b></h2>
                        </div>
                        <div class="col-sm-4 text-right">
                            <!-- Create Plan Button -->
                            <a href="{{route('plan-types.create')}}" class="btn custom-btn d-flex align-items-center justify-content-center" title="Create Plan">
                                <i class="material-icons mr-2">&#xE145;</i> <span>Create New Plan Type</span>
                            </a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($planTypes as $planType)
                            <tr>
                                <td style="width:10%">{{ $planType->id }}</td>
                                <td>{{ $planType->description }} </td>
                                <td><a href="{{route('plan-types.edit',$planType->id)}}" class="edit" title="Edit" data-toggle="tooltip">
                                        <i class="material-icons">&#xE254;</i>
                                    </a>
                                </td>
                        @endforeach

                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</body>
</html>
@endsection
