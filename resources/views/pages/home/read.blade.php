@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <div id="kq_content">
                        <div id="kq_result">
                            {{data}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var url = "http://localhost:8888/laravel-onlineshop/home/read";
        $("#kq_content").load(url + " #kq_result", function (e) {
            console.log(url);
        });
    });
</script>
@endsection
