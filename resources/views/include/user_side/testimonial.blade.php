<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Our Clients Say!!!</h1>
        </div>


        <div class="owl-carousel testimonial-carousel position-relative">
            @foreach($testimonials->slice(0, 6) as $testimonial)
                <div class="testimonial-item bg-white text-center border p-4" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    @if($testimonial->user->image)
                        <img src="{{ asset($testimonial->user->image) }}" alt="Category Image" style="width: 50px; height: 50px; border-radius: 50%;">
                    @else
                        <img src="https://t4.ftcdn.net/jpg/03/49/49/79/360_F_349497933_Ly4im8BDmHLaLzgyKg2f2yZOvJjBtlw5.webp" alt="Category Image" style="width: 100px; height: 100px; border-radius: 50%;margin:20px ">
                    @endif
                    {{-- <h5 class="mb-0">{{$testimonial->user_id}}</h5> --}}
                    <p>{{ $testimonial->created_at->format('Y-m-d') }}</p>
                    <p class="mb-0">{{$testimonial->testimonial}}</p>
                </div>
            @endforeach
        </div>


    </div>
</div>
</div>
