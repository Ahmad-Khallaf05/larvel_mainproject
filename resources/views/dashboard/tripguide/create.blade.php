@extends('layouts.dashboard_master')
@section("add image to trip", "Crate Guides")

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create Guide</h4>
            <form action="{{ route('tripguide.store' , $tripid) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect3">Category name</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="guide_id" >
                        @foreach ($allGuides as $guide)
                            <option value="{{$guide->id}}">{{$guide->name}}</option>
                        @endforeach


                    </select>
                </div>
                <button type="submit">submit</button>
            </form>
        </div>
    </div>
@endsection
