@extends('layout')
@section('content')
    @if ($pets == null)
        <h4>No pets yet!</h4>
    @else
        <div class="grid">
            @foreach ($pets as $pet)
            <div class="card mt-3 mb-3" style="width: 18rem;">
                <img class="card-img-top" src="http://t2.gstatic.com/licensed-image?q=tbn:ANd9GcR3frqA6qXxPHb5gk9vrZQgcHHA78oUVPshn_5s4k1SQ4hUnq7ScWTNp2YOgJYhUuDeLP5hRI_KJXujwiU" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ $pet->name }}</h5>
                  <p class="card-text">{{ $pet->description }}</p>
                  <a href="{{ route('viewPet', $pet->id) }}" class="btn btn-primary">View more</a>
                </div>
              </div>
            @endforeach
        </div>
    @endif
@endsection
