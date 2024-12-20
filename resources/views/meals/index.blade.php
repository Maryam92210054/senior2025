@extends('layouts.nav3')
@section('title') Index @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Data Table</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   

    <link href="{{ asset('css/meals.css') }}" rel="stylesheet">

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Meal <b>Details</b></h2>
                        </div>

                        
                        
                        <div class="col-sm-4 text-right">
                        <form method="GET" action="{{ route('meals.index') }}">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Search&hellip;"
                                    value="{{ request('search') }}"
                                />
                            </div>
                        </form>
                        </div>
                        <div class='button-div'>
                            <!-- Create Meal Button -->
                            <a href="{{ route('meals.create') }}" class="btn btn-success d-flex align-items-center justify-content-center" title="Create Meal">
                                <i class="material-icons mr-2">&#xE145;</i> <span>Create New Meal</span>
                            </a>
                        </div>
                    
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Goal</th>
                            <th>Type</th>
                            <th>Restriction/s</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($meals as $meal)                            <tr>
                                <td>{{ $meal->id }}</td>
                                <td>{{ $meal->name }} </td>
                                <td>{{ Str::limit($meal->description, 50, '...') }}</td>
                                <td>{{ $meal->goal ? $meal->goal->name : 'notfound' }}</td>
                                <td>{{ $meal->mealType ? $meal->mealType->name : 'notfound' }}</td>
                                <td>
                                    @if($meal->restrictions->isEmpty())
                                        None
                                    @else
                                        {{ $meal->restrictions->pluck('name')->implode(', ') }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('meals.show', $meal->id) }}" class="view" title="View" data-toggle="tooltip">
                                        <i class="material-icons">&#xE417;</i>
                                    </a>
                                    <a href="{{route('meals.edit',$meal->id)}}" class="edit" title="Edit" data-toggle="tooltip">
                                        <i class="material-icons">&#xE254;</i>
                                    </a>
                                    <a href="#" class="delete" title="Delete" data-toggle="modal" data-target="#deleteModal-{{ $meal->id }}" style="color: red;">
                                        <i class="material-icons">&#xE872;</i>
                                    </a>

                                    <form id="delete-form-{{ $meal->id }}" action="{{ route('meals.destroy', $meal->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal-{{ $meal->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $meal->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $meal->id }}">Confirm Deletion</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-muted">Are you sure you want to delete this meal? This action cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-form-{{ $meal->id }}').submit();">
                                                        Confirm
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </td>
                            </tr>
                            @empty
            <tr>
                <td colspan="3">No meals found</td>
            </tr>
        @endforelse
                    </tbody>
                </table>
                
                <div class="pagination">
                    {{ $meals->links() }}
                </div>
               
            </div>
        </div>
    </div>
</body>
</html>
@endsection
