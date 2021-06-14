@extends('layouts.admin')

@section('pageTitle')
    edita il ristorante
@endsection

@section('content')

<div class="container">
    <div class="mb-3">
        <h2>{{Auth::user()->name_restaurant}}</h2>
    </div>

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
            <label for="name_restaurant">Nome del ristorante</label>
            <input type="text" class="form-control" id="name_restaurant" name="name_restaurant" placeholder="nome del ristorante" value="{{$user->name_restaurant}}">
        </div>

        <div class="form-group">
            <label for="phone_restaurant">Numero di telefono</label>
            <input type="text" class="form-control" id="phone_restaurant" name="phone_restaurant" placeholder="Numero di telefono" value="{{$user->phone_restaurant}}">
        </div>

        <div class="form-group">
            <label for="address_restaurant">Indirizzo</label>
            <input class="form-control" type="text" id="address_restaurant" name="address_restaurant" placeholder="Indirizzo" value="{{$user->address_restaurant}}">
        </div>
        <div class="form-group">
            <label for="vat_number">p.Iva</label>
            <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="p.Iva" value="{{$user->vat_number}}">
        </div>

        <div class="form-group">
            <label for="image_restaurant">Immagine</label>
            <input type="text" class="form-control" id="image_restaurant" name="image_restaurant" placeholder="Image" value="{{$user->image_restaurant}}">
        </div>

		<div class="mt-3">
			<button type="submit" class="btn btn-primary">Modifica</button>
		</div>
	</form>
</div>



@endsection