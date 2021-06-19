@extends('layouts.guest')

@section('content')
  <div class="container-sm" style="margin-top: 170px">
       
     @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

         <form action="{{route('guest.order.store')}}" method="POST">
            @method("POST")
            @csrf

            <div class="form-group">
                <label for="fullname_guest">Nome e Cognome</label>
                <input type="text" class="form-control" id="fullname_guest" name="fullname_guest" placeholder="Nome e Cogome" value="{{ old('fullname_guest')}}" required>
            </div>

            <div class="form-group">
                <label for="email_guest">Email</label>
                <input type="text" class="form-control" id="email_guest" name="email_guest" placeholder="Email" value="{{ old('email_guest') }}" required>
            </div>

            <div class="form-group">
                <label for="phone_guest">Recapito Telefonico</label>
                <input type="text" class="form-control" id="phone_guest" name="phone_guest" placeholder="Recapito Telefonico" value="{{ old('phone_guest') }}" required>
            </div>

            <div class="form-group">
                <label for="address_guest">Indirizzo</label>
                <input type="text" class="form-control" id="address_guest" name="address_guest" placeholder="Indirizzo" value="{{ old('address_guest') }}" required>
            </div>

            <div class="form-group">
                <label for="delivery_type">Tipo di Consegna</label>
                <select class="form-control" id="delivery_type" name="delivery_type" placeholder="Tipo di consgna">
                    <option value="Consegna a Domicilio">Consegna a Domicilio</option>
                    <option value="Ritiro al Locale">Ritiro al Locale</option>
                </select>
            </div>

            <div class="form-group">
                <label for ="delivery_time">Orario Consegna</label>
                <input class="form-control" id="delivery_time" name="delivery_time" placeholder="2021-05-28 00:00:00" required>
            </div>
            
            <div class="form-group">
                <label for="notes">Note per il Ristorante</label>
                <textarea class="form-control" id="notes" name="notes" rows ="3" placeholder="Note">{{ old('notes') }}</textarea>
            </div>
    
            <button type ="submit" class="btn btn-primary">Dettaglio Ordine e Pagamento</button>
        </form>

    </div>
    <div class="container-sm mt-5">
        {{-- @foreach ($orders as $order)
            <p>Nome cliente: {{$order->fullname_guest}}</p>
            <p>Recapito telefonico: {{$order->phone_guest}}</p>
            <p>indirizzo cliente: {{$order->address_guest}}</p>
            <p>email cliente: {{$order->email_guest}}</p>
            <p>numero ordine:{{$order->id}}</p>
            <p>data ordine: {{$order->date}}</p>
            <p>orario di consegna: {{$order->delivery_time}}</p>
            <p>{{$order->total}}</p>
        @endforeach --}}
    </div>


@endsection
