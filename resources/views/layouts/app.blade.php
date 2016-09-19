<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8; IE=edge">
        
        <title>@section('title') Cửa hàng bách hóa 247 @show</title>
        @section('meta_keywords')
        <meta name="keywords" content="Cửa hàng thực phẩm, bánh, trái cây, dụng cụ học sinh, kem, xôi, thực phẩm đóng hộp">
        @show @section('meta_description')
        <meta name="Description" content="Cửa hàng thực phẩm, bánh, trái cây, dụng cụ học sinh, kem, xôi, thực phẩm đóng hộp">
        <meta name="HandheldFriendly" content="true"/>
        <meta name="robots" content="index, follow"/>
        @show @section('meta_author')
        @show
        <meta name="author" content="www.cuahangbachhoa247.com"/>
        <meta name="generator" content="www.cuahangbachhoa247.com"/>
        <meta name="abstract" content="cuahangbachhoa247.com"/>
        <meta property="og:title" content="www.cuahangbachhoa247.com"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="www.cuahangbachhoa247.com"/>
        <meta property="og:image" content="www.cuahangbachhoa247.com"/>
        <meta property="og:image:width" content="200"/>
        <meta property="og:image:height" content="200"/>
        <meta property="og:site_name" content="Cửa hàng bách hóa 247"/>
        <meta property="og:description" content="Cửa hàng thực phẩm, bánh, trái cây, dụng cụ học sinh, kem, xôi, thực phẩm đóng hộp"/>
        <meta property="fb:app_id" content="1212597675425450"/>       

        <link href="{{ URL::asset('css/common/site.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/common/common.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('js/common/site.js') }}"></script>
        <script src="{{ URL::asset('js/common/common.js') }}"></script>
        <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

        @yield('styles')
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        @include('partials.nav')

        <div class="container">
            @yield('content')
        </div>
        @include('partials.footer')

        <!-- Scripts -->
        @yield('scripts')

    </body>
    
  <script>
  CKEDITOR.replace( 'editor', {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
  });
</script>
</html>
