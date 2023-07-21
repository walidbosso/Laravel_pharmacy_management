<!DOCTYPE html>
    <html lang="fr">

        
          <head>
            <meta charset="utf-8">
            <title>@yield('title')</title>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            

            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>@yield('title')</title> <!-- yield('title')-->
            
            <link rel="icon" href="../images/logo.png" /> 

            

            <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

            
            
          </head>
          


    <body>
        
         @yield('content')

         

    <script src="{{ asset('js/app.js') }}"></script> 

    </body>
</html>
