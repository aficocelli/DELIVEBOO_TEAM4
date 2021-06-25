@extends('layouts.admin')

@section('pageTitle')
    Deliveboo | Register
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Deliveboo {{ __('Register') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="">{{ __('Name') }} *</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror text-capitalize" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="">{{ __('E-Mail Address') }} *</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Password') }} *</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }} *</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>
                        
                        {{-- form registrazione ristorante --}}

                        <div class="form-group">
                            <label for="name_restaurant">Restaurant Name *</label>
                            <input type="text" class="form-control text-capitalize" id="name_restaurant" name="name_restaurant" placeholder="Restaurant Name" value="{{ old('name_restaurant') }}">
                        </div>

                        <div class="form-group">
                            <label for="phone_restaurant">Phone Restaurant *</label>
                            <input type="text" class="form-control" id="phone_restaurant" name="phone_restaurant" placeholder="Phone Restaurant" value="{{ old('phone_restaurant') }}">
                        </div>

                        <div class="form-group">
                            <label for="address_restaurant">Address Restaurant *</label>
                            <input class="form-control text-capitalize" type="text" id="address_restaurant" name="address_restaurant" placeholder="Address Restaurant" value="{{ old('address_restaurant') }}">
                        </div>
                        <div class="form-group">
                            <label for="vat_number">Vat Number *</label>
                            <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="Vat Number" value="{{ old('vat_number') }}">
                        </div>

                        @foreach ($types as $item)
			                <div class="form-check d-inline mr-3">
				                <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="{{$item->origin}}" name="type[]">
				                <label class="form-check-label" for="{{$item->origin}}">
					                {{$item->origin}}
				                </label>
			                </div>
		                @endforeach

                        <div class="form-group">
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <p>(*) fields marked are required</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
