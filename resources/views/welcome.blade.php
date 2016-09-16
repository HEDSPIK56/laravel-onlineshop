@extends('layouts.app')
@section('title') About :: @parent @endsection
@section('content')
	@include('partials.banner',[
								'heading' => $heading,
								'body' => $body
								]);
    <div class="row">
        <div class="page-header">
            <h2>About Page</h2>
        </div>
        <form method="post">
    <textarea id="editor">!</textarea>
  </form>
    </div>
@endsection