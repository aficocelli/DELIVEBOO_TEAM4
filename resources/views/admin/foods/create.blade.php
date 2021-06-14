
@extends('layouts.app')

@section('pageTitle')
	Crea un nuovo menu
@endsection

@section('content')

<div class="container">
	{{-- @if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif --}}

	<form action="{{route('admin.foods.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('POST')
		<div class="form-group">
			<label for="name_food">Nome del menu</label>
			<input type="text" class="form-control" id="name_food" name="name_food" placeholder="Nome del menu">
		</div>
		
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" id="available" name="available">
			<label class="form-check-label" for="available">Disponibile</label>
		
		</div>
		<div class="form-group">
			<label for="food_image">Immagine</label>
			<input class="form-control"  name="food_image" id="food_image" placeholder="immagine del cibo">
		</div>
		<div class="form-group">
			<label for="ingredients">Ingradienti</label>
			<input type="text" class="form_control" id="ingredients" name="ingredients" placeholder="Ingredienti">
			
		</div>
        <div class="form-group">
			<label for="price">Prezzo</label>
			<input type="text" class="form_control" id="price" name="price" placeholder="Prezzo">
			
		</div>
         <div class="form-group">
			<label for="description">Descrizione</label>
			<textarea class="form_control" id="description" name="description" placeholder="Descrizione"></textarea>
			
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" id="vegan" name="vegan">
			<label class="form-check-label" for="vegan">Vegano</label>
		</div>
		{{-- <div class="mt-3">
			<h3>Tags</h3>
			@foreach ($tags as $tag)
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}" name="tags[]">
					<label class="form-check-label" for="{{$tag->name}}">
						{{$tag->name}}
					</label>
				</div>
			@endforeach
		</div> --}}
		<div class="mt-3">
			<button type="submit" class="btn btn-primary">Crea</button>
		</div>
	</form>
</div>
	
@endsection