@extends('layouts.dashboard_master')
@section("add image to trip", "Crate Guides")

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create Guide</h4>
            <form action="{{ route('tripimages.store' , $tripid) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf
                <input type="hidden" value="{{$tripid}}" name="tripid">
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit">submit</button>
            </form>
        </div>
    </div>
@endsection
