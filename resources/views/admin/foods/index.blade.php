@extends('layouts.admin')

@section('pageTitle')
    Lista di menu
@endsection
<a href="{{route('admin.foods.create')}}"><button type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i>Aggiungi un nuovo menu</button></a>
@section('content')
        @foreach ($foods as $food)
        <h1>{{$food->name_food}}</h1>    
        <p>Disponibile: {{$food->available}}</p>
        <p>Descrizione: {{$food->description}}</p>
        <p>Ingredienti: {{$food->ingredients}}</p>
        <p>Prezzo: {{$food->price}}</p>
        <p>Vegano:{{$food->vegan}}</p>
        @endforeach
    <a href="{{route('admin.foods.edit', [ 'food' => $food->id ])}}"><button type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></a>
@endsection