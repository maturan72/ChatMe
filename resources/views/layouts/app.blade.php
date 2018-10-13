<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ChatMe</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .home .message{
            background-color: #baf5bb;
        }
        .modal-dialog {
            width: 355px;
            margin: 30px auto;
        }
        .panel-body{
            background-color: #ddf7dd;
        }

        #profile{
            width: 30px;
            height: 30px;
            border-radius: 100%;
            background-color: black;
        }
        .name{
            margin-top: 5px;
            margin-left: 5px;
        }
        .panel-body .flex-parent{
            display: flex;
        }
        .panel-body .flex1{
            flex: 1;
        }
        .chat-message{
            font-weight: bold;
        }
        .flex-parent{
            display: flex;
        }
        .flex1{
            flex: 1;
        }
        .mychat{
            background-color: lightblue;
            padding: 10px;
            border-radius: 10px;
        }
        .thierchat{
            background-color: lightgray;
            padding: 10px;
            border-radius: 10px;
            color: black;
        }
        .user-color{
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        ChatMe
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                                    <?php 
                                         $images = DB::table('profiles')
                                         ->Where('userId' , Auth::user()->id )
                                         ->get(); 
                                    ?>

                                    @if(count($images) > 0)
                                        @foreach($images as $image)
                                            <img id="profile" src="{{ $image->profileImage }}">
                                        @endforeach
                                    @else
                                        <img id="profile" src="{{ asset('images/avatar.jpg') }}">
                                     
                                    @endif
                                    
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('profile.index') }}">
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

  
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{asset('webcam/webcam.js')}}"></script>
    <script type="text/javascript" src="{{asset('webcam/webcam2.js')}}"></script>

</body>
</html>
