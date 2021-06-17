<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Deliveboo</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

       <div id="root">
           <div class="nav-wrapper">
               <nav class="navbar navbar-expand-md bg-transparent">
                   <div class="container">
                       <a class="navbar-brandm d-flex align-items-center logo-link" href="{{ url('/') }}">
                           <img class="logo" src="{{asset('logo/dropfood-logo.svg')}}" alt="dropfood logo">
                           <h1 class="dropfood">dropfood</h1>
                       </a>
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                           <span class="navbar-toggler-icon"></span>
                       </button>
                       <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <!-- Left Side Of Navbar -->
                           <ul class="navbar-nav mr-auto">
                           </ul>
                           <!-- Right Side Of Navbar -->
                           <ul class="navbar-nav ml-auto">
                               <!-- Authentication Links -->
                               @guest
                                   <li class="nav-item">
                                       <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                   </li>
                                   @if (Route::has('register'))
                                       <li class="nav-item">
                                           <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                       </li>
                                   @endif
                               @else
                                   <li class="nav-item dropdown">
                                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                           {{ Auth::user()->name }}
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                           <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                               {{ __('Logout') }}
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
           </div>
            <main>
                @yield('content')
            </main>
        </div> 
    <!-- vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/homesearch.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
