@extends('layouts.dashboard_master')
@section("headTitle", "Show Guides")

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $guide->name }}</h4>
        @if ($guide->image)
        <div class="text-center mb-4">
        <img src="{{asset($guide->image) }}" alt="{{ $guide->name }}" class="img-fluid rounded">
        </div>
        @endif
        <p><strong>Age:</strong> {{ $guide->age }}</p>
        <p><strong>Gender:</strong> {{ $guide->gender }}</p>
        <p><strong>Description:</strong></p>
        <p>{{ $guide->description }}</p>
        <a href="{{ route('guides.index') }}" class="btn btn-light">Back to List</a>
        <a href="{{ route('guides.edit', $guide->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('guides.destroy', $guide->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
