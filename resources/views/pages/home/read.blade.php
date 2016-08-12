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
                    <div class="fb-comments" data-href="http://wwww.cuahangbachhoa247.com/home/read" data-numposts="10"></div>
                    <!-- Your like button code -->
                    <div class="fb-like" 
                         data-href="http://www.cuahangbachhoa247.com/home/read" 
                         data-layout="standard" 
                            data-action="like" 
                            data-show-faces="true">
                    </div>
                    <div class="fb-share-button" 
                         data-href="http://www.cuahangbachhoa247.com/home/read" 
                         data-layout="button_count">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var url = "{{ route('home.read') }}";
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
