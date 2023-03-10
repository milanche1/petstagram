@extends('layout')
@section('content')
    <form class="mt-5" method="post" action="/create-pet">
        @csrf
        <div class="form-group pb-3">
            <label for="petName">Name*</label>
            <input type="text" name="name" class="form-control" id="petName" placeholder="Enter pet name">
        </div>
        <div class="form-group pb-3">
            <label for="briefDescription">Brief description*</label>
            <input type="text" name="description" class="form-control" id="briefDescription" placeholder="Description">
        </div>
        <div class="form-group pb-3">
            <label class="form-label" for="uploadPhoto">Upload Photo*</label>
            <input type="file" name="file" class="form-control" id="uploadPhoto" />
        </div>
        @if ($owners != null)
        <div class="form-group pb-3">
            <label class="form-label" for="uploadPhoto">Select owner*</label>
            <select class="form-select" aria-label="Select owner" id="selectOwner" name="owner">
                @foreach ($owners as $owner)
                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                @endforeach
            </select>
            <small>Don't see owner on this list? Add them <a href="/create-owner" target="_blank">here</a></small>
        </div>
        @else
            <div class="form-group pb-3">
                <h6>No owners for now</h6>
                <a href="/create-owner" class="btn btn-success">
                    Create owners
                </a>
            </div>
        @endif
        <div class="form-group pb-3">
            <label for="birthday">Pet birthday:*</label>
            <input type="date" id="birthday" name="birthday">
         </div>
        <button type="submit pt-5" class="btn btn-primary">Submit</button>
        @if ($errors->any())
            <div class="form-group pt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection
