@extends('layouts.app', [
    'title' => trans('crud.quick.title'),
    'description' => '',
    'breadcrumbs' => [
        trans('crud.quick.title')
    ]
])

@section('content')
    @include('partials.errors')
    @include('crud.forms._quick')
@endsection
