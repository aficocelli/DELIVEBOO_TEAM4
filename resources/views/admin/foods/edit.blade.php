@extends('layouts.admin')

@section('pageTitle')
    {{Auth::user()->name_restaurant}}
@endsection

@section('content')

<div class="container">
	<a href="{{route('home')}}"><button class="btn btn-primary mt-3 mb-3">Back Home</button></a>

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
			<label for="name_food">Food Name</label>
			<input type="text" class="form-control text-capitalize" id="name_food" name="name_food" placeholder="Food Name" value="{{old('name_food') ? old('name_food') : $food->name_food}}">
		</div>
		
		<div class="form-group">
			<label for="ingredients">Ingredients</label>
			<input type="text" class="form-control text-capitalize" id="ingredients" name="ingredients" placeholder="Ingredients" value="{{old('ingredients') ? old('ingredients') : $food->ingredients}}">
			
		</div>
        <div class="form-group">
			<label for="price">Price</label>
			<input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{old('price') ? old('price') : $food->price}}">
			
		</div>
         <div class="form-group">
			<label for="description">Description</label>
			<textarea class="form-control" id="description" name="description" placeholder="Description"> {{old('description') ? old('description') : $food->description}}</textarea>
		</div>

		<div class="form-group">
			<label for="food_image">Food Image</label>
			<input type="file" id="food_image" name="food_image" placeholder="Food Image">
		</div>

		<div class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" id="available" name="available" {{$food->available ? 'checked' : ''}}>
			<label class="form-check-label" for="available">Available</label>
		
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" id="vegan" name="vegan"  {{$food->vegan ? 'checked' : ''}}>
			<label class="form-check-label" for="vegan">Vegan</label>
		</div>
		<div class="mt-3 text-center">
			<button type="submit" class="btn btn-success pl-5 pr-5">Create</button>
		</div>
	</form>

		
</div>

	
@endsection