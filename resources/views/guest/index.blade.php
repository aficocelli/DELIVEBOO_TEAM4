@extends('layouts.welcome')
@section('content')

  <div class="container-sm">
    <h1>Pagina principale - Lista dei ristoranti</h1>
    <a href="{{route('home')}}"><button type="button" class="btn btn-success">HOME</button></a>
  </div>
  
   <!-- barra di ricerca per tipologia -->  <div class="d-flex justify-content-center align-items-center search__restaurant">
    <div class="mt-5">
      <h1 class="mb-3">Benvenuti</h1>
      <h4 class="mb-3">cerca</h4>
      <input  type="text" placeholder="cerca categorie" value="" v-model="search">
      <button class="btn btn-outline-light btn-success btn-lg" type="button" name="button" v-on:click="filterGenre()">Search</button>
    </div>
  </div>
  <!-- ristoranti -->
  <div class="container-small d-flex flex-wrap">
      <div v-for="user in users" class="card mt-3 mr-3" style="width: 15rem;">
          <a :href="'http://127.0.0.1:8000/users/'+ user.id">
            <img :src="user.image_restaurant" class="card-img-top" :alt="user.name_restaurant">
            <div class="card-body">
              <h3>@{{user.name_restaurant}}</h3>
              <p>@{{user.name}}</p>
              <p>@{{user.address_restaurant}}</p>
              <p>@{{user.phone_restaurant}}</p>
            </div>
          </a>
      </div>
  </div>
    

 
@endsection
