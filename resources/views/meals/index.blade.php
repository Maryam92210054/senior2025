@extends('layouts.nav3')
@section('title') Index @endsection
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
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Meal Details Heading -->
                        <h2>Meal <b>Details</b></h2>

                        <!-- Search Form -->
                        <form method="GET" action="{{ route('meals.index') }}" class="search-form">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Search&hellip;"
                                    value="{{ request('search') }}" />
                            </div>
                        </form>

                        <!-- Filter Button -->
                        <button type="button" class="filter-button" data-bs-toggle="modal" data-bs-target="#filterModal">
                            <b>Filters</b>
                        </button>
                    </div>

                    <!-- Create Meal Button -->
                    <div class="button-div mt-3">
                        <a href="{{ route('meals.create') }}" class="btn custom-btn d-flex align-items-center justify-content-center" title="Create Meal">
                            <i class="material-icons mr-2">&#xE145;</i> <span>Create New Meal</span>
                        </a>
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
                        @forelse ($meals as $meal)
                        <tr>
                            <td>{{ $meal->id }}</td>
                            <td>{{ $meal->name }}</td>
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
                                <a href="{{ route('meals.edit', $meal->id) }}" class="edit" title="Edit" data-toggle="tooltip">
                                    <i class="material-icons">&#xE254;</i>
                                </a>

                                @if ($meal->availability === 1)
                                <i class="material-icons text-success toggle-availability"
                                    title="Available"
                                    data-id="{{ $meal->id }}"
                                    data-availability="1">&#xE5CA;</i>
                                @else
                                <i class="material-icons text-danger toggle-availability"
                                    title="Unavailable"
                                    data-id="{{ $meal->id }}"
                                    data-availability="0">&#xE14C;</i>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">No meals found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Filter Modal -->
                <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="filterModalLabel">Apply Filters</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Filter Form -->
                                <form method="GET" action="{{ route('meals.index') }}">
                                    <div class="form-group mb-3">
                                        <label for="">Meal Type:</label>
                                        <select name="meal_type_id" class="form-control">
                                            <option value="" disabled selected>Select Meal Type</option>
                                            @foreach ($types as $type)
                                            <option value="{{ $type->id }}">
                                                {{ $type->name }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Meal Goal:</label>
                                        <select name="goal_id" class="form-control">
                                            <option value="" disabled selected>Select Meal Goal</option>
                                            @foreach ($goals as $goal)
                                            <option value="{{ $goal->id }}">
                                                {{ $goal->name }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Dietary Restrictions:</label>
                                        @foreach ($restrictions as $restriction)
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="restrictions[]"
                                                value="{{ $restriction->id }}"
                                                id="restriction_{{ $restriction->id }}"
                                                {{ is_array(request('restrictions')) && in_array($restriction->id, request('restrictions')) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="restriction_{{ $restriction->id }}">
                                                {{ $restriction->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>



                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-apply-filters ">Apply Filters</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).on('click', '.toggle-availability', function() {
                        const mealId = $(this).data('id');
                        const currentAvailability = $(this).data('availability');

                        $.ajax({
                            url: `/meals/${mealId}/toggle-availability`,
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                availability: currentAvailability
                            },
                            success: function(response) {
                                console.log('Response:', response); // Debugging availability
                                if (response.availability) {
                                    $(`[data-id="${mealId}"]`)
                                        .removeClass('text-danger')
                                        .addClass('text-success')
                                        .html('&#xE5CA;') // Check Icon
                                        .data('availability', 1)
                                        .attr('title', 'Available');
                                } else {
                                    $(`[data-id="${mealId}"]`)
                                        .removeClass('text-success')
                                        .addClass('text-danger')
                                        .html('&#xE14C;') // Close Icon
                                        .data('availability', 0)
                                        .attr('title', 'Unavailable');
                                }
                            },
                            error: function() {
                                alert('An error occurred while updating availability.');
                            }
                        });
                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

                <div class="pagination">
                    {{ $meals->links() }}
                </div>

            </div>
        </div>
    </div>
</body>

</html>
@endsection