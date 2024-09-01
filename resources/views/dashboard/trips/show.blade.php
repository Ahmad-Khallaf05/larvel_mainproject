@extends('layouts.dashboard_master')
@section("headTitle", "Show Trip Info")

@section('content')
    <style>
        .fixed-size-img {
            height: 200px;
            object-fit: cover;
        }
    </style>

    <div class="card">
        <div class="card-body">
            <!-- Recent Updates Section -->
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$trip->name}}</h4>
                            <div class="d-flex mb-3">

                                <div class="d-flex align-items-center text-muted font-weight-light">
                                    <span>start:{{date('y/m/d' , strtotime($trip->start_at))}}</span>
                                </div>
                                <div class="d-flex align-items-center text-muted font-weight-light">
                                    <span>|end:{{date('y/m/d' , strtotime($trip->start_at))}}</span>
                                </div>
                            </div>

                            <!-- Trip Images Section -->
                            <div class="row">
                                <div class="col-6 pe-1">
                                    @foreach($tripImages->take(2) as $tripimag)
                                        <img src="{{ asset($tripimag->image) }}" class="img-fluid mb-2 w-100 rounded fixed-size-img" alt="Trip Image">
                                    @endforeach
                                </div>
                                <div class="col-6 ps-1">
                                    @foreach($tripImages->skip(2)->take(2) as $tripimag)
                                        <img src="{{ asset($tripimag->image) }}" class="img-fluid mb-2 w-100 rounded fixed-size-img" alt="Trip Image">
                                    @endforeach
                                </div>
                            </div>

                            <!-- Update Description Section -->

                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Tickets Section -->
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Tickets</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th> Assignee </th>
                                        <th> Subject </ th>
                                        <th> Gender </th>
                                        <th> Age </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset($tripGuids->image) }}" class="img-fluid rounded-circle me-2" alt="Guide Image" style="width: 40px; height: 40px;">
                                            {{ $tripGuids->name }}
                                        </td>
                                        <td> {{ $tripGuids->description }} </td>
                                        <td> {{ $tripGuids->gender }} </td>
                                        <td> {{ $tripGuids->age }} </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('guides.index') }}" class="btn btn-light">Back to List</a>
                <div>
                    <a href="" class="btn btn-warning">Edit</a>
                    <form action="" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
