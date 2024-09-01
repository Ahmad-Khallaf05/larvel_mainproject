@extends('layouts.dashboard_master')
@section("headTitle", "Guides")

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Guides List</h4>
        <a href="{{ route('guides.create') }}" class="btn btn-success mb-3">Add New Guide</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($guides->isEmpty())
            <p>No guides found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guides as $guide)
                        <tr>
                        <td>
                                @if($guide->image)
                                    <img src="{{ asset($guide->image) }}" alt="{{ $guide->name }}" class="img-fluid" width="100">
                                @else
                                    <p>No Image</p>
                                @endif
                            </td>
                            <td>{{ $guide->name }}</td>
                            <td>{{ $guide->age }}</td>
                            <td>{{ $guide->gender }}</td>
                            <td>
                                <a href="{{ route('guides.show', $guide->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('guides.edit', $guide->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('guides.destroy', $guide->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
