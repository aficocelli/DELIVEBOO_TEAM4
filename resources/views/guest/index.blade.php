@extends('layouts.guest-index')

@section('page-title')
    dropfood
@endsection

@section('content')


{{-- <div class="text-center no_risultati" v-show="userRestaurants.length == 0">
  <h3 class="" > Nessun risultato trovato, cerca per categoria!</h3>
</div> --}}

<!-- ristoranti filtrati tramite input e bottoni-->
{{-- <div id="box-scroll" class="d-flex flex-wrap justify-content-center card_container mt-5 mb-5 mw-75">
  <div v-for="element in userRestaurants">
    <div  class="card rounded card_custom mt-3 border mr-3 card_container rounded-pill">
      <a class="text-decoration-none text-reset" :href="'http://127.0.0.1:8000/users/'+ element.id">
        <div class="card_image">
          <img class="img_card" :src="element.image_restaurant ? 'http://127.0.0.1:8000/storage/' + element.image_restaurant : 'http://lorempixel.com/400/300/food'" :alt="element.name_restaurant">
        </div>
        <div class="card-body text-center">
          <h3>"@{{element.name_restaurant}}"</h3>
          <p>@{{element.name}}</p>
          <p>@{{element.address_restaurant}}</p>
          <p>Tel: @{{element.phone_restaurant}}</p>
          <p>@{{element.email}}</p>
          <p>P.Iva: @{{element.vat_number}}</p>
        </div>
      </a>
    </div>
  </div>
</div> --}}
<div class="text-center" v-if="userRestaurants.length > 0">
  <h2 class="scelti">- i tuoi risultati -</h2>
</div>
<div class="contenitore_custom section_center">
  <div class="wrapper_sezione_guest" >
    <div class="card_custom" v-for="element in userRestaurants">
      <div class="wrapper_custom_cart" >
        <a class="card_link text-reset text-decoration-none" id="chosen_item" :href="'http://127.0.0.1:8000/users/'+ element.id">
          <div class="card_image mb-3 text-capitalize">
            <img :src="element.image_restaurant ? 'storage/' + element.image_restaurant : 'http://lorempixel.com/400/300/food'" :alt="element.name_restaurant">
          </div>
          <div class="card_text" id="chosen_text" >
            <h3>"@{{element.name_restaurant}}"</h3>
            <p>@{{element.name}}</p>
            <p class="card_address">@{{element.address_restaurant}}</p>
            <p>Tel: @{{element.phone_restaurant}}</p>
            <p>@{{element.email}}</p>
            <p>P.Iva: @{{element.vat_number}}</p>
          </div>
        </a>
      </div>
    </div> 
  </div>
</div>



<!-- small selection dei ristoranti stampando i primi 8-->
<div class="text-center">
  <h2 class="scelti">- Scelti per voi -</h2>
</div>
<div class="carousel_selezione">
  <div class="chev chev_left" @@click="prev(min, max)">
    <i class="fas fa-chevron-left chev__link"></i>
  </div>

  <div class="wrapper_sezione" >  
      <div class="card_custom" v-for="(element, index) in smallSelection.slice(min, max)">
        <a class="card_link" :href="'http://127.0.0.1:8000/users/'+ element.id">
          <div class="card_image">
            <img :src="element.image_restaurant ? 'storage/' + element.image_restaurant : 'http://lorempixel.com/400/300/food'" :alt="element.name_restaurant">
          </div>
          <div class="card_text">
            <h3>"@{{element.name_restaurant}}"</h3>
            <p>@{{element.name}}</p>
            <p class="card_address">@{{element.address_restaurant}}</p>
            <p>Tel: @{{element.phone_restaurant}}</p>
            <p>@{{element.email}}</p>
            <p>P.Iva: @{{element.vat_number}}</p>
          </div>
        </a>
      </div>
  </div>

  <div class="chev chev_right" @@click="next(min, max)">
    <i class="fas fa-chevron-right chev__link"></i>
  </div>
</div>

   {{-- <div class="d-flex flex-wrap justify-content-center card_container mt-5 mb-5">
    <!-- ristoranti -->
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
  </div> --}}

  <!-- back to top button -->
  <button class="back-to-top" @@click="backToTop" :class="chevronBackToTop ? 'back-to-top--active' : '' ">
    <i class="fas fa-chevron-up"></i>
  </button>
  <!-- /back to top button -->

@endsection
