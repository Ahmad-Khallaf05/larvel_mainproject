@extends('layouts.dashboard_master')

@section('headTitle', 'Categories')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="title-1">testimonial</h2>
            {{-- <a href="{{ route('categories.create') }}">
                <button type="button" class="btn btn-primary">
                    <i class="zmdi zmdi-plus"></i> Add New Category
                </button>
            </a> --}}
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive table--no-card m-b-40">
                    <table class="table table-bordered bg-white">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">user name</th>
                            <th scope="col">testimonial</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($testimonials as $testimonial)
                            <tr>
                                <th scope="row">{{ $testimonial->id }}</th>
                                <td>
                                    @if($testimonial->user->image)
                                        <img src="{{ asset($testimonial->user->image) }}" alt="Category Image" style="width: 50px; border-radius: 50px;">
                                    @else
                                        <img src="https://t4.ftcdn.net/jpg/03/49/49/79/360_F_349497933_Ly4im8BDmHLaLzgyKg2f2yZOvJjBtlw5.webp" alt="Category Image"  style="width: 50px; height: 50px; border-radius: 50%;">
                                    @endif
                                </td>
                                <td>{{$testimonial->user->name}}</td>
                                <td>{{ $testimonial->testimonial }}</td>
                                <td>{{ $testimonial->created_at->format('Y-m-d') }}</td>
                                <td>
                                    {{-- <a href="{{ route('testimonials.edit', $testimonial->id) }}">
                                        <button type="button" class="btn btn-secondary">Edit</button>
                                    </a>
                                    --}}
                                    <button type="button" class="btn btn-danger" onclick="confirmDeletion(event, '{{ route('testimonials.destroy', $testimonial->id) }}')">DELETE</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Confirmation Modal -->
    <div id="confirmationModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 1000;">
        <div style="background: #fff; padding: 20px; border-radius: 5px; text-align: center;">
            <p>Are you sure you want to delete this category?</p>
            <button id="confirmButton" class="btn btn-danger">Confirm</button>
            <button id="cancelButton" class="btn btn-secondary">Cancel</button>
        </div>
    </div>

    <script>
        function confirmDeletion(event, url) {
            event.preventDefault(); // Prevent the default form submission -. تريد منع نموذج من الإرسال عند النقر على زر الإرسال
            var modal = document.getElementById('confirmationModal');
            var confirmButton = document.getElementById('confirmButton');
            var cancelButton = document.getElementById('cancelButton');

            // Show the custom confirmation dialog
            modal.style.display = 'flex';

            // Set up the confirm button to submit the form
            confirmButton.onclick = function() {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = url;

                var csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                // "hidden" يُستخدم للإشارة إلى طرق مختلفة لجعل العناصر غير مرئية أو مخفية
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}'; // Laravel CSRF token
                form.appendChild(csrfToken);

                var methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);

                document.body.appendChild(form);
                form.submit();
            };

            // Set up the cancel button to hide the modal
            cancelButton.onclick = function() {
                modal.style.display = 'none';
            };
        }
    </script>
@endsection
