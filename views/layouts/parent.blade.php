<!--
| StAuth10065: I Dylan Hernandez, 000307857 certify that this material is my original work. 
| No other person's work has been used without due acknowledgement. 
| I have not made my work available to anyone else.
-->

<html>
    <head>
        <title>Lab 3 - @yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style> * { -webkit-border-radius: 0 !important; -moz-border-radius: 0 !important; border-radius: 0 !important; } </style>
        @yield('style')
    </head>
    <body>
        <div class="container">
            <h1>Lab 3 <small>Laravel Application</small></h1>
        </div>   
        <div>
            @include('layouts.navigate')
        </div>
        <div class="container">
            @yield('content')
        </div>
        <div>
            @include('layouts.footer')
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        @yield('script')        
    </body>
</html>