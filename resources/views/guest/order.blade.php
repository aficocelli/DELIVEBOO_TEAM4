{{-- @extends('layouts.app')

@section('content')
    <div class="container-sm">
        @foreach ($orders as $order)
            <p>Nome cliente: {{$order->fullname_guest}}</p>
            <p>Recapito telefonico: {{$order->phone_guest}}</p>
            <p>indirizzo cliente: {{$order->address_guest}}</p>
            <p>email cliente: {{$order->email_guest}}</p>
            <p>numero ordine:{{$order->id}}</p>
            <p>data ordine: {{$order->date}}</p>
            <p>orario di consegna: {{$order->delivery_time}}</p>
            <p>{{$order->total}}</p>
        @endforeach
    </div>

@endsection --}}

<head>
  <meta charset="utf-8">
  <script src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.min.js"></script>
</head>
<body>
  <!-- Step one: add an empty container to your page -->
  <div id="dropin-container">

    <h1>Qui va il carrello?</h1>

  </div>

  <script type="text/javascript">
  // Step two: create a dropin instance using that container (or a string
//   that functions as a query selector such as `#dropin-container`)

    braintree.dropin.create({
    container: document.getElementById('dropin-container'),
  // ...plus remaining configuration
        authorization: CLIENT_TOKEN_FROM_SERVER,
        container: '#dropin-container'
        
    }, (error, dropinInstance) => {
  // Use `dropinInstance` here
  // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
    });
  </script>
</body>