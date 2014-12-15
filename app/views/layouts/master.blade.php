<!-- Stored in app/views/layouts/master.blade.php -->

<html>
    <body>
        LAYOUTTTT
        
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>