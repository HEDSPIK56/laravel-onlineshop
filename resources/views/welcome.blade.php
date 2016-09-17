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
    <textarea id="editor"></textarea>
  </form>
    </div>
    <script type="text/javascript">
             CKEDITOR.replace('editor', {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        </script>
@endsection