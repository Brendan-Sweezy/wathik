@extends('app.theme')


@section('content')
    @include('app.budget.head')
    @include('app.budget.tabs.' . $target)
@endsection
