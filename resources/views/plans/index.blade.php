@extends('layouts.nav3')
@section('title') manage plans @endsection
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
                            <h2>Plan <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4 text-right">
                            <!-- Create Plan Button -->
                            <a href="{{route('plans.create')}}" class="btn custom-btn d-flex align-items-center justify-content-center" title="Create Plan">
                                <i class="material-icons mr-2">&#xE145;</i> <span>Create New Plan</span>
                            </a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Price Per Day</th>
                            <th>Goal</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $plan)
                            <tr>
                                <td>{{ $plan->id }}</td>
                                <td>{{ Str::limit($plan->description, 50, '...') }}</td>
                                <td>{{ $plan->price }} </td>

                                <td>{{ $plan->goal ? $plan->goal->name : 'notfound' }}</td>
                                <td>{{ $plan->planType ? $plan->planType->description : 'notfound' }}</td>
                                <td>
                                    <a href="{{route('plans.show',$plan->id)}}" class="view" title="View" data-toggle="tooltip">
                                        <i class="material-icons">&#xE417;</i>
                                    </a>
                                    <a href="{{route('plans.edit',$plan->id)}}" class="edit" title="Edit" data-toggle="tooltip">
                                        <i class="material-icons">&#xE254;</i>
                                    </a>
                                    @if ($plan->availability === 1)
                                        <i class="material-icons text-success toggle-availability"
                                           title="Available"
                                           data-id="{{ $plan->id }}"
                                           data-availability="1">&#xE5CA;</i> 
                                    @else
                                        <i class="material-icons text-danger toggle-availability"
                                           title="Unavailable"
                                           data-id="{{ $plan->id }}"
                                           data-availability="0">&#xE14C;</i> 
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).on('click', '.toggle-availability', function () {
                        const planId = $(this).data('id');
                        const currentAvailability = $(this).data('availability');

                        $.ajax({
                            url: `/plans/${planId}/toggle-availability`,
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                availability: currentAvailability
                            },
                            success: function (response) {
                                console.log('Response:', response); // Debugging availability
                                if (response.availability) {
                                    $(`[data-id="${planId}"]`)
                                        .removeClass('text-danger')
                                        .addClass('text-success')
                                        .html('&#xE5CA;') // Check Icon
                                        .data('availability', 1)
                                        .attr('title', 'Available');
                                } else {
                                    $(`[data-id="${planId}"]`)
                                        .removeClass('text-success')
                                        .addClass('text-danger')
                                        .html('&#xE14C;') // Close Icon
                                        .data('availability', 0)
                                        .attr('title', 'Unavailable');
                                }
                            },
                            error: function () {
                                alert('An error occurred while updating availability.');
                            }
                        });
                    });
                </script>
                
            </div>
        </div>
    </div>
</body>
</html>
@endsection
