@extends('layout')
@section('content')
    <h1>Hello World</h1>

    @if ($pets != null)
        <h2>Some Owners</h2>
    @else
        <h2>No pets</h2>
    @endif
@endsection
