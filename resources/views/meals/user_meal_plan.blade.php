@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5">
    <div class="container white-container p-5">
        <h1 class="text-center">Your Meal Plan</h1>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Meal Type</th>
                    <th>Meal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userMeals as $day => $meals)
                    @foreach ($meals as $meal)
                        <tr>
                            <td>Day {{ $day }}</td>
                            <td>{{ $meal->mealType->name }}</td>
                            <td>{{ $meal->meal->name }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
