@extends('layouts.nav2')

@section('content')
<table class="table table-bordered mt-4" style="border-color: #bddb8f;">
    <thead  class="thead-light" style="background-color: #bddb8f; color: white;">
        <tr>
            <th>Day Number</th>
            <th>Date</th>
            @foreach ($mealTypes as $mealType)
                <th>{{ $mealType->name }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($orderDayMealsData as $orderDayData)
            <tr>
                <td>{{ $orderDayData['day_number'] }}</td>
                <td>{{ $orderDayData['date'] }}</td>

                @foreach ($mealTypes as $mealType)
                    <td>
                            @foreach ($orderDayData['meals_by_type'][$mealType->name] as $mealName)
                                <p>{{ $mealName }}</p>
                            @endforeach
                        
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('styles')

<link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">

<style>

.italiana-font {
    font-family: 'Italiana', serif;
}

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.custom-background {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #bddb8f; 
}

.white-container {
    background-color: white;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.table-bordered {
    border: 2px solid #bddb8f; 
}

.table thead th {
    background-color: #bddb8f;
    color: white; 
    font-weight: bold;
}

.meal-table-image {
    height: 100px;
    width: 100px;
    object-fit: cover;
    border-radius: 5px;
}

.table tbody td {
    vertical-align: middle;
}

h1 {
    color: black;
    font-weight: bold;
    margin-bottom: 30px;
}

.btn-success {
    background-color: #4caf50;
    border-color: #4caf50;
}

.btn-success:hover {
    background-color: #45a049;
}

</style>