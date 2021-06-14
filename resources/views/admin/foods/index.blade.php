@extends('layouts.app')

@section('pageTitle')
    Lista di menu
@endsection


@section('content')
<div class="container-sm">
<a href="{{route('admin.foods.create')}}"><button type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i>Aggiungi un nuovo menu</button></a>
        @foreach ($foods as $food)
        <h1>{{$food->name_food}}</h1>    
        <p>Disponibile: {{$food->available}}</p>
        <p>Descrizione: {{$food->description}}</p>
        <p>Ingredienti: {{$food->ingredients}}</p>
        <p>Prezzo: {{$food->price}}</p>
        <p>Vegano:{{$food->vegan}}</p>
        @endforeach
    <a href="{{route('admin.foods.edit', [ 'food' => $food->id ])}}"><button type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></a>
    <a href="{{route('home')}}">
            <button type="button" class="btn btn-primary ">Home Dashboard</button>
          </a></div>

@endsection