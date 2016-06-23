
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
        <!-- header -->
        @include('includes.header')
        <!-- end header -->

        <!-- content -->
        @yield('content')
        <!-- end content-->

        <!-- footer -->
        @include('includes.footer')
        <!-- end footer -->
    </body>
</html>