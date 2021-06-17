@extends('layouts.app')

@section('pageTitle')
    Lista di menu
@endsection


@section('content')
<div id="boh">
    <div class="container-sm">
    <a href="{{route('admin.foods.create')}}"><button type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i>Aggiungi un nuovo menu</button></a>
            @foreach ($foods as $food)
            <img src="{{$food->food_image ? asset('storage/' . $food->food_image) : 'http://lorempixel.com/400/200/food'}}" alt="{{$food->name_food}}" style="width: 100px">
            <h1>{{$food->name_food}}</h1>    
            <p>Disponibile: {!! $food->available ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times-circle"></i>'!!}</p>
            <p>Descrizione: {{$food->description}}</p>
            <p>Ingredienti: {{$food->ingredients}}</p>
            <p>Prezzo: {{$food->price}} euro </p>
            <p>Vegano: {!! $food->vegan ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times-circle"></i>'!!}</p>
            <a href="{{route('admin.foods.edit', [ 'food' => $food->id ])}}"><button type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></a>
            <form action="{{route('admin.foods.destroy', [ 'food' => $food->id ])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2"><i class="fas fa-trash"></i></button>
            </form>
            @endforeach
        <a href="{{route('home')}}">
                <button type="button" class="btn btn-primary ">Home Dashboard</button>
            </a></div>

            <p>@{{test}}</p>

</div>
{{-- cdn vuejs --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>		  
<script src="{{asset('js/newScript.js')}}"></script>
@endsection