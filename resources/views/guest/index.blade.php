@extends('layouts.welcome')
@section('content')

<div class="container-sm">
  <h1>Pagina principale - Lista dei ristoranti</h1>
  <a href="{{route('home')}}"><button type="button" class="btn btn-success">HOME</button></a>
  {{-- <form action="">
    <input type="text" placeholder="Cerca Ristorante" v-model="mainSelect">
  </form> --}}
  <div class="d-flex justify-content-center align-items-center ">
               <div class="mt-5">
                  <h1 class="mb-3">Benvenuti</h1>
                  <h4 class="mb-3">cerca</h4>
                  
                  <input  type="text" placeholder="cerca categorie" value="" v-model="search">
                  <button class="btn btn-outline-light btn-success btn-lg" type="button" name="button" v-on:click="filterGenre()">Search</button>
               </div>
  {{-- select tipologie ristoranti --}}
  
  {{-- <select class="form-select" aria-label="Default select example" v-model="selectType" name="type_id">
    <option></option>
    <option v-for="(type, index) in types" @@click="searchTypes(index)" :value="type.origin">@{{type.origin}}</option>
  </select> --}}
  {{-- <div>
            <div v-for="(type, index) in types">
            <button> @{{type.origin}} </button> 
            </div>
  </div> --}}
  
  
  {{-- /select tipologie ristoranti --}}

  <div class="container-big d-flex flex-wrap">

  

  <div v-for="user in restaurants" class="card mt-3 mr-3" style="width: 15rem;">
    <img :src="user.image_restaurant" class="card-img-top" :alt="user.name_restaurant">
    <div class="card-body">
      <h3>@{{user.name_restaurant}}</h3>
      <p>@{{user.name}}</p>
      <p>@{{user.address_restaurant}}</p>
      <p>@{{user.phone_restaurant}}</p>
    </div>
  </div>


 
@endsection


  {{-- @foreach ($users as $user)
    <a href="{{route('guest.show', ['user' => $user->id])}}">
      <div class="card mt-3 mr-3" style="width: 15rem;">
        <img src="{{$user->image_restaurant}}" class="card-img-top" alt="{{$user->name_restaurant}}">
        <div class="card-body">
          <h3>{{$user->name_restaurant}}</h3>
          <p>{{$user->name}}</p>
          <p>{{$user->address_restaurant}}</p>
          <p>{{$user->phone_restaurant}}</p>
        </div>
      </div>
    </a>
  @endforeach --}}