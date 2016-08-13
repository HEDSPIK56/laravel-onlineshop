
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <!-- head -->
    @include('includes.head')
    <!-- end head -->
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=1212597675425450";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- header -->
        @include('includes.header')
        <!-- end header -->

        <!-- content -->
        @yield('content')
        <!-- end content-->

        <!-- footer -->
        @include('includes.footer')
        <!-- end footer -->
        @yield('javascript')
    </body>
</html>