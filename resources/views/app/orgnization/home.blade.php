@extends('app.theme')


@section('content')
    @include('app.orgnization.head')
    @include('app.orgnization.tabs.' . $target)
@endsection
