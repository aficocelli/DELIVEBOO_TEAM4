@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        {{-- form registrazione ristorante --}}

                        <div class="form-group">
                            <label for="name_restaurant">Nome del ristorante</label>
                            <input type="text" class="form-control" id="name_restaurant" name="name_restaurant" placeholder="nome del ristorante">
                        </div>

                        <div class="form-group">
                            <label for="phone_restaurant">Numero di telefono</label>
                            <input type="text" class="form-control" id="phone_restaurant" name="phone_restaurant" placeholder="Numero di telefono">
                        </div>

                        <div class="form-group">
                            <label for="address_restaurant">Indirizzo</label>
                            <input class="form-control" type="text" id="address_restaurant" name="address_restaurant" placeholder="Indirizzo">
                        </div>
                        <div class="form-group">
                            <label for="vat_number">p.Iva</label>
                            <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="p.Iva">
                        </div>

                        <div class="form-group">
                            <label for="image_restaurant">Immagine</label>
                            <input type="text" class="form-control" id="image_restaurant" name="image_restaurant" placeholder="Image">
                        </div>
                        {{-- type --}}
                        
                        @dd($types)
                        {{-- @foreach ($type as $item)
			                <div class="form-check">
				                <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="{{$item->origin}}" name="type[]">
				                <label class="form-check-label" for="{{$item->origin}}">
					                {{$item->origin}}
				                </label>
			                </div>
		                @endforeach --}}
                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
