@extends('layouts.app')

@section('pageTitle')
	Modifica menu
@endsection

@section('content')

<div class="container">
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{route('admin.foods.update', ['food'=>$food->id])}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="name_food">Nome del menu</label>
			<input type="text" class="form-control" id="name_food" name="name_food" placeholder="Nome del menu" value="{{$food->name_food}}">
		</div>
		
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" id="available" name="available" {{$food->available ? 'checked' : ''}}>
			<label class="form-check-label" for="available">Disponibile</label>
		
		</div>
		<div class="form-group">
			<label for="food_image">Immagine</label>
			<input class="form-control"  name="food_image" id="food_image" placeholder="immagine del cibo" value="{{$food->food_image}}">
		</div>
		<div class="form-group">
			<label for="ingredients">Ingradienti</label>
			<input type="text" class="form_control" id="ingredients" name="ingredients" placeholder="Ingredienti" value="{{$food->ingredients}}">
			
		</div>
        <div class="form-group">
			<label for="price">Prezzo</label>
			<input type="text" class="form_control" id="price" name="price" placeholder="Prezzo" value="{{$food->price}}">
			
		</div>
         <div class="form-group">
			<label for="description">Descrizione</label>
			<textarea class="form_control" id="description" name="description" placeholder="description">{{$food->description}}</textarea>
			
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" id="vegan" name="vegan"  {{$food->vegan ? 'checked' : ''}}>
			<label class="form-check-label" for="vegan">Vegano</label>
		</div>
		<div class="mt-3">
			<button type="submit" class="btn btn-primary">Crea</button>
		</div>
	</form>

		<a href="{{route('home')}}">Torna alla home ristorante</a>
</div>

	
@endsection