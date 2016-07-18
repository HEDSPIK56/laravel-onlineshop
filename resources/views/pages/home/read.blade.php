@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                    <button id="get_data" class="btn btn-default">Xem ket qua so so</button>
                    <div id="kq_content">
                        <div id="kq_result">
                            <table class="table tab-content">
                                {{ $data }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var url = "http://localhost:8888/laravel-onlineshop/public/home/read";
        $("#get_data").click(function(e){
            $.ajax({
                type: "GET",
                url: url,
                dataType: "html",

                success: function (data) {
                    console.log(data);
                    $(".table.tab-content").html('').append(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>
@endsection
