@extends('layouts.app')
@section('title') About :: @parent @endsection
@section('content')
{!! Breadcrumbs::render('home') !!}
	@include('partials.banner',[
								'heading' => $heading,
								'body' => $body
								])
    <div class="row">
        <div class="page-header">
            <h2>About Page</h2>
        </div>
        <textarea id="editor" class="my-editor" name="content"></textarea>
    </div>
@endsection