

@extends('layouts.guest')

<div id="root" class="container-sm" style="margin-top: 170px">
  <h1 class="mt-3">Il tuo ordine è confermato</h1>

  <h2>Dettaglio Ordine</h2>
    <div class="container-sm mt-5 mb-5">     
      
      <h4><strong>Numero ordine:</strong> N. {{$order->id}}</h4>
      <h4><strong>Nome cliente:</strong> </strong>{{$order->fullname_guest}}</h4>
      <h4><strong>Recapito telefonico:</strong> </strong>{{$order->phone_guest}}</h4>
      <h4><strong>Indirizzo:</strong> {{$order->address_guest}}</h4>
      <h4><strong>Email:</strong> {{$order->email_guest}}</h4>
      <h4><strong>Data ordine:</strong> {{date("H:i d-m-Y")}}</h4>
      <h4><strong>Tipo di consegna:</strong> {{$order->delivery_type}}</h4>
      <h4><strong>Orario di consegna:</strong> {{date("H", strtotime('+4 hours'))}}:30</h4>
      <h4><strong>Totale ordine:</strong> {{$order->total = number_format($order->total, 2)}} € </h4>
      {{-- <h4>Totale: </h4><span id="totale_price" >@{{total}}</span> Euro --}}
      
</div>



<div class="mt-3">
  <a href='{{route('guest.index')}}' class="btn btn-primary">Home</a>
</div>

</div>

<script>

      // window.onload = function() {
      //   axios.get('http://localhost:8000/api/search/foods')
      // .then((result) => {
      //   var foods = result.data;
      //   console.log(foods);
      // });
      // }


</script>