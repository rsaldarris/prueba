<!doctype html>

<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title','Home Page')</title>
    <!--Styles -->
    <link rel="shortcut icon" sizes="114x100" href="{{ asset('img/product/1604871776La-Jeepeta-de-Nio-Garcia-Brray-y-Juanka-se-lleno-Anuel-AA-y-Myke-Towers-se-unen-para-lanzar-el-Remix.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    <b>Lujos Jeepetas</b>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">       
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('automovil.show') }}">
                                <b>Autos</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('allies.api') }}">
                                <b>@lang('messages.allies')</b>
                            </a>
                        </li>
                    </ul>
                
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <b>@lang('messages.language')</b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('language.setLanguage','es')}}">
                                    <b>@lang('messages.spanish')</b>
                                </a>
                                <a class="dropdown-item" href="{{ route('language.setLanguage','en')}}">
                                    <b>@lang('messages.english')</b>
                                </a>
                            </div>
                        </li>

                        @guest
                            <li class="nav-item mx-0 mx-lg-1">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <b>@lang('messages.login')</b>
                                </a>
                            </li>
                            <li class="nav-item mx-0 mx-lg-1">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <b>@lang('messages.register')</b>
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>{{ Auth::user()->name }}</b>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->getRole()=="admin")
                                        <a class="dropdown-item" href="{{ route('automovil.create') }}">
                                            <b>Crear Automovil</b>
                                        </a>
                                    @endif


                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <b>@lang('messages.logout')</b>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div> 
            </div>    
        </nav>
        <main class="py-4">
            @yield('content')
        </main>

    </div>
</body>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</html>