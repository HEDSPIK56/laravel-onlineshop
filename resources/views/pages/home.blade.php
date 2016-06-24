@extends('layouts.app')

@section('content')
	{!! Breadcrumbs::render('home') !!}
    @include('includes.new-collections')
@endsection
