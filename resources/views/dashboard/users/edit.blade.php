@extends('layouts.dashboard_master')
@section("headTitle", "Create users")

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit user</h4>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
            class="forms-sample">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>

            <div class="form-group">
                <label for="phone">phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
            </div>
            <div class="form-group">
                <label for="usertype">usertype</label>
                <select  class="form-control" id="usertype" name="usertype" value="{{$user->usertype}}">

                    <option @selected($user->usertype == 'user' ) value="user">user</option>
                    <option @selected($user->usertype == 'admin' ) >admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>
@endsection
