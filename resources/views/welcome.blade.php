<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Deliveboo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="{{ asset('css/script.css') }}" rel="stylesheet">
        
    </head>

    <body>
        <div class="container text-center" style="margin-top: 20px; width:800px;">
            <div style="background-color: #FF9900; text-align:center; color: #fff; padding:30px 0; border-radius:20px">
                <img src="{{asset('img-carousel/dropfood-logo-white.svg')}}" alt="Dropfood" style ="width: 200px; height:100px;">
                <h1 style="font-weight: bold;" class="font-weight-bold text-white">dropfood</h1>
            </div>
            <h2 class="mt-3 text-center" style= "font-family: 'Permanent Marker', cursive;">Gentile <span> Francesca Petraroia</span> il suo ordine è confermato!</h2> 
            
            <div class="d-flex justify-content-start container-sm mt-5 mb-5" style="background-color: #FF9900; text-align:center; padding:30px 0; border-radius:20px">     
            
                <h4><strong>Numero ordine:</strong> 15</h4>
                <h4><strong>Nome cliente:</strong> </strong><span style="text-transform:capitalize;">Francesca Petraroia</span></h4>
                <h4><strong>Recapito telefonico:</strong> </strong>3280963774</h4>
                <h4><strong>Indirizzo:</strong><span style="text-transform:capitalize;">Via Roma, 190</span></h4>
                <h4><strong>Email:</strong> francesca@gmail.com</h4>
                <h4><strong>Data ordine:</strong> {{date("H:i d-m-Y")}}</h4>
                <h4><strong>Tipo di consegna:</strong> Consegna a domicilio</h4>
                <h4><strong>Orario di consegna:</strong> {{date("H", strtotime('+4 hours'))}}:30</h4>
                <h4><strong>Totale ordine:</strong> 45.00 € </h4>
            {{-- <h4>Totale: </h4><span id="totale_price" >@{{total}}</span> Euro --}}  
            </div>
        </div>
</body>
    {{-- <div id="root">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('logo/dropfood-logo.svg')}}" alt="dropfood logo">
                    <h1>dropfood</h1>
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

        <main>
            @yield('content')
        </main>

        <h1>Pagina principale - Lista dei ristoranti</h1>
        <a href="{{route('home')}}"><button type="button" class="btn btn-success">HOME</button></a>
    </div>  --}}
     
       
       
    <!-- vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
