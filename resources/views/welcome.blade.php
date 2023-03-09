@extends('layout')
@section('content')
    <h1>Hello World</h1>

    @if ($pets == null)
        <h2>Some Owners</h2>
    @else
    <ul>
        @foreach ($pets as $pet)
        <li>{{ $pet }}</li>
        @endforeach

    </ul>
    @endif
@endsection
