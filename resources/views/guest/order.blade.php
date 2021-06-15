@extends('layouts.app')

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

@endsection

