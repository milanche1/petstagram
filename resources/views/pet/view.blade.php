@extends('layout')
@section('content')
    <h2 class="text-center mt-4 mb-4">{{ $pet->name }}</h2>
    <div class="row text-center">
        <img class="center-block"
            src={{ $pet->image == null ? 'https://media.istockphoto.com/id/889640780/photo/chihuahua-sitting-looking-at-the-camera-5-year-old-isolated-on-white.jpg?s=612x612&w=0&k=20&c=9CfHSY3cvKZ6QJpF0WUVAaZbzOBusNg6j7uwLD0BCJs=' : '/avatars/' . $pet->image->name }}>
    </div>
    <p class="mt-3 text-center">{{ $pet->description }}</p>
    <h5>Owner Info:</h5>
    <p>Name: {{ $pet->owner->name }}</p>
    <p>Owner birtdate: {{ date('Y-m-d', strtotime($pet->owner->dob)) }}</p>

    @if ($pet->owner->pets->count() >= 2)
        <h4>Owners other pets: </h4>
        <div class="grid">
            @foreach ($pet->owner->pets as $ownerPet)
                @if ($ownerPet->id != $pet->id)
                    <div class="card mt-3 mb-3" style="width: 18rem;">
                        <img class="card-img-top" src={{ $ownerPet->image == null ? 'https://media.istockphoto.com/id/889640780/photo/chihuahua-sitting-looking-at-the-camera-5-year-old-isolated-on-white.jpg?s=612x612&w=0&k=20&c=9CfHSY3cvKZ6QJpF0WUVAaZbzOBusNg6j7uwLD0BCJs=' : '/avatars/' . $ownerPet->image->name }} alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ownerPet->name }}</h5>
                            <p class="card-text">{{ $ownerPet->description }}</p>
                            <a href="{{ route('viewPet', $ownerPet->id) }}" class="btn btn-primary">View more</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
@endsection
