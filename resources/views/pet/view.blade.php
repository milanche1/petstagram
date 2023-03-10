@extends('layout')
@section('content')
    <h2 class="text-center mt-4 mb-4">{{ $pet->name }}</h2>
    <img src="http://t2.gstatic.com/licensed-image?q=tbn:ANd9GcR3frqA6qXxPHb5gk9vrZQgcHHA78oUVPshn_5s4k1SQ4hUnq7ScWTNp2YOgJYhUuDeLP5hRI_KJXujwiU">
    <p class="mt-3 text-center">{{ $pet->description }}</p>
    <h5>Owner Info:</h5>
    <p>Name: {{ $pet->owner->name }}</p>
    <p>Owner birtdate: {{ date('Y-m-d', strtotime($pet->owner->dob)) }}</p>


    <h4>Owners other pets: </h4>
    <div class="grid">
        @foreach ($pet->owner->pets as $ownerPet)
            @if ($ownerPet->id != $pet->id)
                <div class="card mt-3 mb-3" style="width: 18rem;">
                    <img class="card-img-top"
                        src="http://t2.gstatic.com/licensed-image?q=tbn:ANd9GcR3frqA6qXxPHb5gk9vrZQgcHHA78oUVPshn_5s4k1SQ4hUnq7ScWTNp2YOgJYhUuDeLP5hRI_KJXujwiU"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ownerPet->name }}</h5>
                        <p class="card-text">{{ $ownerPet->description }}</p>
                        <a href="{{ route('viewPet', $ownerPet->id) }}" class="btn btn-primary">View more</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
