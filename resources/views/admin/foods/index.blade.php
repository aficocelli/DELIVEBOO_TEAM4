@extends('layouts.admin')

@section('pageTitle')
    Inserisci il ristorante
@endsection

@section('content')
    @foreach ($foods as $item)
        <h1>{{$item->name_food}}</h1>    
    @endforeach
@endsection