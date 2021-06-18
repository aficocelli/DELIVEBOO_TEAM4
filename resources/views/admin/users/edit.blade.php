@extends('layouts.admin')

@section('pageTitle')
    {{Auth::user()->name_restaurant}}
@endsection

@section('content')

<div class="container">

	<a href="{{route('home', [ 'user' => $user->id ])}}">
        <button type="button" class="btn btn-primary mb-3 ">Back Home</button>
    </a>

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{route('admin.users.update', ['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
            <label for="name_restaurant">Name</label>
            <input type="text" class="form-control" id="name_restaurant" name="name_restaurant" placeholder="Name" value="{{old('name_restaurant') ? old('name_restaurant') : $user->name_restaurant}}">
        </div>

        <div class="form-group">
            <label for="phone_restaurant">Phone</label>
            <input type="text" class="form-control" id="phone_restaurant" name="phone_restaurant" placeholder="Phone" value="{{old('phone_restaurant') ? old('phone_restaurant') : $user->phone_restaurant}}">
        </div>

        <div class="form-group">
            <label for="address_restaurant">Address</label>
            <input class="form-control" type="text" id="address_restaurant" name="address_restaurant" placeholder="Address" value="{{old('address_restaurant') ? old('address_restaurant') : $user->address_restaurant}}">
        </div>

        <div class="form-group">
            <label for="vat_number">Vat Number</label>
            <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="Vat Number" value="{{old('vat_number') ? old('vat_number') : $user->vat_number}}">
        </div>

        <div class="form-group">
			<label for="image_restaurant">Image</label>
			<input type="file" id="image_restaurant" name="image_restaurant" placeholder="Image">
		</div>

        {{-- stampo i checkbox --}}

        @foreach ($types as $type)
			<div class="form-check d-inline mr-5">
				<input class="form-check-input" type="checkbox" value="{{$type->id}}" id="{{$type->origin}}" name="types[]" {{ $user->types->contains($type) ? 'checked' : '' }}>
				<label class="form-check-label" for="{{$type->origin}}">
					{{$type->origin}}
				</label>
			</div>
		@endforeach

		<div class="mt-3 text-center p-3">
			<button type="submit" class="btn btn-success pl-5 pr-5">Edit</button>
		</div>
	</form>
</div>


@endsection