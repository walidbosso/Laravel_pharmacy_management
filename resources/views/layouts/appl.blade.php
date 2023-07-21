<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- bootstrap: public css app.css (it works,, prove: index)-->
    <link href="resources/sass/app.scss" rel="stylesheet"> <!-- custom css (like in sidebar)-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="icon" href="../images/logo.png" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="app">
        @include('include/sidebar')
        

        <div class="container-fluid">
            <div class="container">
                <!-- Ajout header ici -->
                <!-- header-->    
                <section class="row content-header">
                    <div class="header-title col-md-11">
                        <p class="h4 pt-2"><i class="fa fa-@yield('icon')"></i>&emsp;@yield('titre')</p>
                        &emsp;&emsp;&emsp;<small class="font-weight-bold h6">@yield('sous-titre')</small>
                    </div>
                    <div class="col-md-1 user_options">
                        <button class="col col-md-1 m-3" onclick="showOptions();">
                            <i class="fa fa-gear"></i>
                        </button>
                    <div id="mark"><i class="fa fa-play fa-rotate-270"></i></div>
                        <ul id="options" class="options list-unstyled" style="display: none;">
                            <li>
                            <a href="Profile"><i class="fa fa-user"></i><span>My Profile</span></a>
                            </li>
                            <li>
                            <a href="ChangePassword"><i class="fa fa-edit"></i><span>Change Password</span></a>
                            </li>
                            <li>
                            <a href="logout"><i class="fa fa-key"></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </section>
                <hr style="border-top: 2px solid #ff5252;">
                <!-- fin header -->
                


                @yield('content')

                @include('include/messages')


                <br/>
                
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!--<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>-->
</body>
</html>
