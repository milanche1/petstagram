@extends('layout')
@section('content')
    @if ($pets->isEmpty())
        <h4 class="text-center mt-5 mb-5">No pets yet!</h4>
    @else
        <div class="grid">
            @foreach ($pets as $pet)
            <div class="card mt-3 mb-3" style="width: 18rem;">
                @php
                @endphp
                <img class="card-img-top" src={{ $pet->image == null ? 'https://media.istockphoto.com/id/889640780/photo/chihuahua-sitting-looking-at-the-camera-5-year-old-isolated-on-white.jpg?s=612x612&w=0&k=20&c=9CfHSY3cvKZ6QJpF0WUVAaZbzOBusNg6j7uwLD0BCJs=' : '/avatars/' . $pet->image->name }} alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ $pet->name }}</h5>
                  <p class="card-text">{{ $pet->description }}</p>
                  <a href="{{ route('viewPet', $pet->id) }}" class="btn btn-primary">View more</a>
                </div>
              </div>
            @endforeach
        </div>
        <div class="form-group mt-5 mb-5">
            {!! $pets->links('pagination::bootstrap-4') !!}
        </div>

    @endif
@endsection
