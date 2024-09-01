@extends("layouts/user_side_master")
@section("pagename", "Guide Profile")
@section("content")
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Travel Guide</h6>
            <h1 class="mb-5">Guide Profile</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="profile-item d-flex flex-column align-items-center text-center">
                    <div class="profile-img overflow-hidden rounded-circle mb-4" style="width: 200px; height: 200px;">
                        <img class="img-fluid" src="{{ asset($guide->image) }}" alt="{{ $guide->name }}">
                    </div>
                    <h2 class="mb-3">{{ $guide->name }}</h2>
                    <p>
                        <span class="rating-display">
                        Average Rating:  
                            {{ number_format($guide->ratings->avg('rate') ?? 0, 1) }}
                            /5<span>★</span>
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <h3>About {{ $guide->name }}</h3>
                <p class="text-muted">Gender: {{ $guide->gender }}</p>
                <p class="text-muted">Age: {{ $guide->age }}</p>
                <p class="text-muted">Description: <br> {{ $guide->description }}</p>

                <form action="{{ route('guides.rate', $guide->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <h3 for="rate" class="form-label">Rate this guide:</h3>
                        <div class="star-rating">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rate" value="{{ $i }}" />
                                <label for="star{{ $i }}">★</label>
                            @endfor
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit Rating</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
