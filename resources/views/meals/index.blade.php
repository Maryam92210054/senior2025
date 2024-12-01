@extends('layouts.nav3')
@section('title') Index @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
<link href="{{ asset('css/meals.css') }}" rel="stylesheet">

</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Meal <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name </th>
                        <th>Description</th>
                        <th>Goal </th>
                        <th>Type</th>
                        <th>Restriction/s </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($meals as $meal)
                    <tr>
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
                            <a href="{{route('meals.show',$meal->id)}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                  @endforeach
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