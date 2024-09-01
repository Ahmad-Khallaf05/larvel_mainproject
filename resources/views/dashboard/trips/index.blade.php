@extends("layouts.dashboard_master")
@section("headTitle", "One")
@section("content")

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="title-1">Trips</h2>
        <a href="{{ route('trips.create') }}">
            <button type="button" class="btn btn-primary">
                <i class="zmdi zmdi-plus"></i> Add New trip
            </button>
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-bordered bg-white">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Location</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Start_at</th>
                            <th scope="col">End_at</th>
                            <th scope="col">Category name</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trips as $trip)
                        <tr>
                            <th scope="row">{{ $trip->id }}</th>
                            <td>{{ $trip->name }}</td>
                            <td>{{ $trip->description }}</td>
                            <td>{{ $trip->location }}</td>
                            <td>{{ $trip->capacity }}</td>
                            <td>{{ $trip->price }}</td>
                            <td>{{ $trip->start_at }}</td>
                            <td>{{ $trip->end_at }}</td>
                            <td>{{ $trip->category? $trip->category->name : 'not found'}}</td>

                            
                           
                            <td>
                                <a href="{{ route('trips.edit', $trip->id) }}">
                                    <button type="submit" class="btn btn-secondary">Edit</button>
                                </a>
                                <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>       
                                </form>                     
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
