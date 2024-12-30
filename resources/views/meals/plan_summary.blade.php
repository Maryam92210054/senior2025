@extends('layouts.nav2')

@section('content')

    <head>
    <link href="{{ asset('css/meals.css') }}" rel="stylesheet">

    </head>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
            <h2>Your <b>Plan</b></h2>
    <table  class="table table-striped table-hover table-bordered" >
            <thead class="thead-light" >
                <tr>
                    <th>#</th>
                    <th>Day</th>
                    <th>Date</th>
               
                    @php
                        // Get unique meal types for the first plan
                        $mealTypes = [];
                        foreach ($planData as $plan) {
                            foreach ($plan['meals'] as $mealId) {
                                $meal = \App\Models\Meal::find($mealId);
                                if (!in_array($meal->meal_type_id, $mealTypes)) {
                                    $mealTypes[] = $meal->meal_type_id;
                                }
                            }
                        }
                    @endphp

                  
                    @foreach ($mealTypes as $mealTypeId)
                        @php
                            $mealType = \App\Models\MealType::find($mealTypeId); // Fetch the meal type by ID
                        @endphp
                        <th style="width: {{ 70 / count($mealTypes) }}%;">{{ $mealType ? $mealType->name : 'Unknown Meal Type' }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($planData as $plan)
                    <tr>
                        <td>{{ $plan['day'] }}</td>
                        <td>{{ date('D', strtotime($plan['date'])) }}</td>
                        <td>{{ $plan['date'] }}</td>

                        @foreach ($mealTypes as $mealTypeId)
                            <td>
                                @foreach ($plan['meals'] as $mealId)
                                    @php
                                        $meal = \App\Models\Meal::find($mealId);
                                    @endphp
                                    @if ($meal && $meal->meal_type_id == $mealTypeId)
                                        <p>{{ $meal->name }}</p>
                                        <img src="{{ asset('mealsImages/'.$meal->meal_image) }}" alt="{{ $meal->name }}" class="meal-image" style="height: 100px; width: 100px; object-fit: cover;">
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <form action="{{ route('confirmOrder') }}" method="POST" class="mt-4">
            @csrf
    
            <div class="delivery-time">
                <label>Choose Delivery Time:</label>
                <select name="delivery_time" id="delivery_time" class="form-control" style="background-color: #fefae0;color:black;" required>>
                    <option value="07:00:00">07:00 AM - 08:00 AM</option>
                    <option value="08:00:00">08:00 AM - 09:00 AM</option>
                    <option value="09:00:00">09:00 AM - 10:00 AM</option>
                    <option value="10:00:00">10:00 AM - 11:00 AM</option>
                    <option value="11:00:00">11:00 AM - 12:00 PM</option>
                    <option value="12:00:00">12:00 PM - 01:00 PM</option>
                </select>
            </div>
                
            <input type="hidden" name="plan_id" value="{{ $plan_id }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
            
            @foreach ($planData as $key => $plan)
                <input type="hidden" name="planData[{{ $key }}][day]" value="{{ $plan['day'] }}">
                <input type="hidden" name="planData[{{ $key }}][date]" value="{{ $plan['date'] }}">
                @foreach ($plan['meals'] as $mealId)
                    <input type="hidden" name="planData[{{ $key }}][meals][]" value="{{ $mealId }}">
                @endforeach
            @endforeach

            </div>
            </div>

            </div>


       
        
            <div class="text-center mt-3">
                <button type="submit" class="btn custom-btn">Proceed To Payment</button>
            </div>

   

@endsection


