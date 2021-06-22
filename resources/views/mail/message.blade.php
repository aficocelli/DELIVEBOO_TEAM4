<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="root" class="container-sm" style="margin-top: 170px">
  <h1 class="mt-3">Gentile {{$order->fullname_guest}} il suo ordine è confermato</h1>

  <h2>Di seguito il suo dettaglio Ordine</h2>
    <div class="container-sm mt-5 mb-5">     
      
      <h4><strong>Numero ordine:</strong> N. {{$order->id}}</h4>
      <h4><strong>Nome cliente:</strong> </strong>{{$order->fullname_guest}}</h4>
      <h4><strong>Recapito telefonico:</strong> </strong>{{$order->phone_guest}}</h4>
      <h4><strong>Indirizzo:</strong> {{$order->address_guest}}</h4>
      <h4><strong>Email:</strong> {{$order->email_guest}}</h4>
      <h4><strong>Data ordine:</strong> {{date("H:i d-m-Y")}}</h4>
      <h4><strong>Tipo di consegna:</strong> {{$order->delivery_type}}</h4>
      <h4><strong>Orario di consegna:</strong> {{date("H", strtotime('+4 hours'))}}:30</h4>
      <h4><strong>Totale ordine:</strong> {{$order->total}} € </h4>
      {{-- <h4>Totale: </h4><span id="totale_price" >@{{total}}</span> Euro --}}
      
</div>

</body>
</html>