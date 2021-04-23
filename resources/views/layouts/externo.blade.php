<html>
    <head>  <title>@yield('title')</title>  </head>
    <body>
        @section('sidebar')
        ALO | ALO | ALO <br>
        -------------------------------------------------------------------
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>