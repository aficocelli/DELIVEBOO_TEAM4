<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
  <div id="root" class="container-sm" style="margin-top: 170px;">
  <div style="background-color: #FF9900; text-align:center; color:white; padding:30px 0; border-radius:20px">
    <img src="{{asset('img-carousel/dropfood-logo-white.svg')}}" alt="Dropfood" style ="width: 400px; height:200px;">
    <h1 class="mt-3">Gentile <span style="text-transform: uppercase; font-family: "Montserrat", sans-serif;">{{$order->fullname_guest}}</span> il suo ordine è confermato</h1> 
  </div>
  <h2 style="font-family: 'Montserrat', sans-serif;">Di seguito il suo dettaglio Ordine</h2> 
  <div class="container-sm mt-5 mb-5">     
      
      <h4><strong>Numero ordine:</strong> N. {{$order->id}}</h4>
      <h4><strong>Nome cliente:</strong> </strong><span style="text-transform:capitalize;">{{$order->fullname_guest}}</span></h4>
      <h4><strong>Recapito telefonico:</strong> </strong>{{$order->phone_guest}}</h4>
      <h4><strong>Indirizzo:</strong><span style="text-transform:capitalize;">{{$order->address_guest}}</span></h4>
      <h4><strong>Email:</strong> {{$order->email_guest}}</h4>
      <h4><strong>Data ordine:</strong> {{date("H:i d-m-Y")}}</h4>
      <h4><strong>Tipo di consegna:</strong> {{$order->delivery_type}}</h4>
      <h4><strong>Orario di consegna:</strong> {{date("H", strtotime('+4 hours'))}}:30</h4>
      <h4><strong>Totale ordine:</strong> {{$order->total}} € </h4>
      {{-- <h4>Totale: </h4><span id="totale_price" >@{{total}}</span> Euro --}}
      
</div>
 
</body>
</html>