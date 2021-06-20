<header class="mb-5">
    <div class="nav-wrapper" :class="headerTopSticky == false ? 'nav-wrapper--scroll_nav' : '' ">
        <!-- navbar -->
        <nav class="navbar navbar-expand-md bg-transparent navbar_index">
            <div class="container">
                <!-- sezione logo e login -->
                <a class="navbar-brand d-flex align-items-center logo-link" href="{{ url('/') }}">
                    <img class="logo" src="{{asset('img-carousel/dropfood-logo-white.svg')}}" alt="dropfood logo">
                    <h1 class="dropfood">dropfood</h1>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse login-navbar-wrapper" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto login-navbar">
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
                                <a class="dropdown-item" href="{{ route('home') }}">{{Auth::user()->name_restaurant}}</a>
                            </li>
                        @endguest
                            
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- hero -->
    <div class="hero">  
        <div class="hero__search">
            <!-- barra di ricerca per tipologia -->  
            <h2 class="index-title mb-5">Cerca un ristorante vicino a te!</h2>
            <div class="d-flex justify-content-center mb-5">
                <input  class="main_input" type="text" placeholder="cerca ristorante per tipo" v-model="filter" @@keyup.enter="filterTypes()">
                <button class="btn_primary" type="button" name="button" v-on:click="filterTypes()">Cerca</button>
            </div>  
            <div class="types d-flex types_search">
                <div class="type_tag" v-for="type in types">    
                    <button v-on:click="buttonTypes(type.origin)" type="text"  class="btn_types d-inline mr-2">@{{type.origin}}</button>    
                </div>
            </div>                    
        </div>
    </div>
    <!-- /hero -->
</header>
