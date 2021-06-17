@extends('layouts.welcome')
@section('content')
  
  <!-- Carousel jumbotron -->

  <div class="guest-jumbotron">
    <div v-for='image in carousel' class="carousel-image">
      
      <img :src="image" alt="">

    </div>
    
     <!-- <img src="{{asset('img-carousel/' . 'pizza-7.jpg')}}" alt=""> -->
  </div>
  
  
  
  
  
  
  <div class="container-sm">
    <h1>Pagina principale - Lista dei ristoranti</h1>
    <a href="{{route('home')}}"><button type="button" class="btn btn-success">HOME</button></a>
  
   <!-- barra di ricerca per tipologia -->  <div class="d-flex justify-content-center align-items-center search__restaurant">
    <div class="mt-5">
      <h1 class="mb-3">Benvenuti</h1>
      <h4 class="mb-3">cerca</h4>
      <input  type="text" placeholder="cerca categorie" v-model="filter">
      <button class="btn btn-outline-light btn-success btn-lg" type="button" name="button" v-on:click="filterTypes()">Search</button>
    </div>
  </div>

  <!-- ristoranti -->
  <div class="container-small d-flex flex-wrap">
      <div v-for="element in userRestaurants" class="card mt-3 mr-3" style="width: 15rem;">
          <a :href="'http://127.0.0.1:8000/users/'+ element.id">
            <img :src="element.image_restaurant ? 'element.image_restaurant' : 'http://lorempixel.com/400/200/food'" :alt="element.name_restaurant" style="width: 100px">
            <div class="card-body">
              <h3>@{{element.name_restaurant}}</h3>
              <p>@{{element.name}}</p>
              <p>@{{element.address_restaurant}}</p>
              <p>@{{element.phone_restaurant}}</p>
            </div>
          </a>
      </div>
  </div>
    
    

 
@endsection
