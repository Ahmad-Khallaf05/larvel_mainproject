@extends("layouts/user_side_master")

@section("pagename" , "user profile")

@section("content")
<h1>User Profile</h1>
    
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>User Type:</strong> {{ $user->usertype }}</p>
    <p><strong>Phone:</strong> {{ $user->phone }}</p>
    <p><strong>Image:</strong> 
        @if($user->image)
            <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" style="width: 100px; height: auto;">
        @else
            No image uploaded
        @endif
    </p>
    <p><strong>Account Created At:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}</p>
    
    <!-- Add a link to go back to home or other pages -->
@endsection
