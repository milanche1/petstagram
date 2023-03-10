@extends('layout')
@section('content')
    <form class="mt-5" method="post" action="/create-pet">
        @csrf
        <div class="form-group pb-3">
            <label for="ownerName">Name*</label>
            <input type="text" name="name" class="form-control" id="ownerName" placeholder="Enter owner name">
        </div>
        <div class="form-group pb-3">
            <label for="birthday">Owner birthday:*</label>
            <input type="date" id="birthday" name="birthday">
         </div>
        <button type="submit pt-5" class="btn btn-primary">Create</button>
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
