@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="filepath">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                    <textarea id="my-editor" name="content" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $(document).ready(function () {
        console.log("ready!");
        $('#lfm').filemanager('image');
        $('#lfm').filemanager('file');
        CKEDITOR.replace('my-editor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    });
</script>
@endsection

