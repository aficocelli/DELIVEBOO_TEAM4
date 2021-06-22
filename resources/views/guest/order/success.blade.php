

@extends('layouts.guest')

<div id="root" class="container-sm" style="margin-top: 170px">
  <h2>Dettaglio Ordine</h2>
    <div class="container-sm mt-5 mb-5">     
      
      <h4><strong>Numero ordine:</strong> N. {{$order->id}}</h4>
      <h4><strong>Nome cliente:</strong> </strong>{{$order->fullname_guest}}</h4>
      <h4><strong>Recapito telefonico:</strong> </strong>{{$order->h3hone_guest}}</h4>
      <h4><strong>Indirizzo:</strong> {{$order->address_guest}}</h4>
      <h4><strong>Email:</strong> {{$order->email_guest}}</h4>
      <h4><strong>Data ordine:</strong> {{date("H:i d-m-Y")}}</h4>
      <h4><strong>Tipo di consegna:</strong> {{$order->delivery_type}}</h4>
      <h4><strong>Orario di consegna:</strong> {{date("H", strtotime('+4 hours'))}}:30</h4>
      <h4><strong>Totale ordine:</strong> {{$order->total}} € </h4>
      {{-- <h4>Totale: </h4><span id="totale_price" >@{{total}}</span> Euro --}}
      
</div>


<h2 class="mt-3">Checkout pagamento</h2>
<div class="mt-3">
  <a href='{{route('guest.order.payment')}}' class="btn btn-primary">Procedi al Pagamento</a>
</div>

</div>

