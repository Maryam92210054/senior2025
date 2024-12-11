@extends('layouts.nav3')
@section('title') manage plans @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Data Table</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <link href="{{ asset('css/meals.css') }}" rel="stylesheet">

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
                            <a href="{{route('plans.create')}}" class="btn btn-success d-flex align-items-center justify-content-center" title="Create Plan">
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
                                    <a href="{{route('plans.destroy',$plan->id)}}" class="delete" title="Delete" data-toggle="modal" data-target="#deleteModal-{{ $plan->id }}" style="color: red;">
                                        <i class="material-icons">&#xE872;</i>
                                    </a>

                                    <form id="delete-form-{{ $plan->id }}" action="{{ route('plans.destroy', $plan->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal-{{ $plan->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $plan->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $plan->id }}">Confirm Deletion</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-muted">Are you sure you want to delete this plan? This action cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-form-{{ $plan->id }}').submit();">
                                                        Confirm
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->

                                 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</body>
</html>
@endsection
