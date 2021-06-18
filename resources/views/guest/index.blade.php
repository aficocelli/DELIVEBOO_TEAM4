@extends('layouts.guest')

@section('page-title')
    dropfood
@endsection

@section('content') 
  <div class="container">
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
  </div>

@endsection
