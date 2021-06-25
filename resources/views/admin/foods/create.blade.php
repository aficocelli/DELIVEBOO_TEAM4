@extends('layouts.admin')

@section('pageTitle')
    {{Auth::user()->name_restaurant}}
@endsection

@section('content')

<div class="container">

	@if ($foods->isNotEmpty())
		<a href="{{route('admin.foods.index')}}">
			<button type="button" class="btn btn-primary mb-3 p-2 border border-light rounded-pill">Back To Foods</button>
		</a> 
	@endif 

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form class="custom__form" action="{{route('admin.foods.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('POST')
		<div class="form-group">
			<label for="name_food">Food Name *</label>
			<input type="text" class="form-control text-capitalize" id="name_food" name="name_food" placeholder="Food Name" value="{{ old('name_food') }}">
		</div>
		
		<div class="form-group">
			<label for="ingredients">Ingredients *</label>
			<input type="text" class="form-control text-capitalize" id="ingredients" name="ingredients" placeholder="Ingredients" value="{{ old('ingredients') }}">		
		</div>

        <div class="form-group">
			<label for="price">Price *</label>
			<input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}">	
		</div>

         <div class="form-group">
			<label for="description">Description *</label>
			<textarea class="form-control" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>
		</div>

		<div class="form-group">
			<label for="food_image">Food Image</label>
			<input type="file" id="food_image" name="food_image">
		</div>

		<div class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" id="available" name="available">
			<label class="form-check-label" for="available">Available</label>
		</div>

		<div class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" id="vegan" name="vegan">
			<label class="form-check-label" for="vegan">Vegan</label>
		</div>
		<div class="mt-3 text-center">
			<button id="submit-button" type="submit" class="rounded-pill btn btn-success pl-5 pr-5">Create</button>
		</div>
		<p>(*) fields marked are required</p>
	</form>
			  
		
	
</div>

	
@endsection