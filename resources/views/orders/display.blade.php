@extends('layouts.nav3')
@section('title') display order @endsection
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
                            <h2>Order <b>Details</b></h2>
                        </div>
                        
                    </div>
                </div>
                <table  class="table table-striped table-hover table-bordered" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="width: 5%; white-space: nowrap;">Day Number</th>
            <th style="width: 10%; ">Date</th>
            @foreach ($mealTypes as $type)
                <th style="width: 15%; max-width: 150px; overflow: hidden; text-overflow: ellipsis;">
                    {{ $type->name }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    @foreach ($orderDays as $day)
    <tr>
        <td>{{ $day->day_number }}</td>
        <td>{{ $day->date }}</td>
        
        @foreach ($mealTypes as $type)
            <td>
                @php
                    // Fetch the meal for this meal type
                    $meal = $day->meals->firstWhere('mealType.id', $type->id);
                @endphp
                
                @if ($meal)
                    <strong>Id: </strong> {{ $meal->id }} <br>
                    <strong>Name: </strong> {{ $meal->name }}
                @else
                    ---
                @endif
            </td>
        @endforeach
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
