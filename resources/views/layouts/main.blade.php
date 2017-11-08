<!doctype html>
<html lang="en">

    <head>
    @include('partials._head')
    </head>
    
    <body class="body_background">
        @include('partials._nav')

        <div class="container" style="padding-top:50px">

            @include('partials._messages')

            @yield('content')<!-- yield area will be different for each page -->
            @include('partials._footer')
        </div><!-- end of .container -->

        @include('partials._javascript')

        @yield('scripts')

    </body>
</html>