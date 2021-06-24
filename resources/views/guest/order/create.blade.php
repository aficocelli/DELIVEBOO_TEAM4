@extends('layouts.guest-order')

@section('content')
  <div class="container-sm" id="form_cust">
       
     @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

         <form id="payment" action="{{route('guest.order.store')}}" method="POST">
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
                <label for="notes">Note per il Ristorante</label>
                <textarea class="form-control" id="notes" name="notes" rows ="3" placeholder="Note" required>{{ old('notes') }}</textarea>
            </div>
            {{-- <label for="total">Note per il Ristorante</label>
           <input id="total" type="text" value="" name="total" > --}}

           
            <div id="root" class="form-group">
                {{-- <input type="text" id="total" name="total"  value=""> --}}
                <textarea name="total" id="total" cols="0" rows="0"   hidden readonly></textarea>
                {{-- <p>il totale è: <h1 id="result"></h1> euro</p> --}}
            </div>
            {{-- <button type ="submit" class="btn btn-primary">Dettaglio Ordine e Pagamento</button> --}}

            <div class="container pl-0 pr-0">
            <div id="dropin-container"></div>
                <button id="submit-button">Request payment method</button>
                <input type="hidden" id="nonce" name="payment_method_nonce"/>
                
            </div>
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

<script>
    window.onload = function() {
        var onlyFoodsSalvati = [];
        var onlyFoods = [];
                axios.get('http://localhost:8000/api/search/foods/onlyfoods')
            .then((result) => {
                onlyFoods = result.data;
                for (let index = 0; index < onlyFoods.length; index++) {
                // console.log(onlyFoods[index].id);
                var quantita =localStorage.getItem("food_Id_"+onlyFoods[index].id);
                var cibo = "";
                if(quantita!=null)
                {
                    console.log("quantita-->"+quantita);
                    console.log("cibo-->"+onlyFoods[index].name_food);
                }
            }
        });

    document.getElementById("total").value = localStorage.getItem("bigTotal");
};

    var token = '{{$clientToken}}';
    var button = document.querySelector('#submit-button');
    var payment = document.querySelector('#payment');
    braintree.dropin.create({
    authorization: token,
    selector: '#dropin-container'
    }, function (err, instance) {
    payment.addEventListener('submit', function (event) {
        event.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
            // if (err) {
            //     console.log('Request Payment Method Error', err);
            //     return;
            // }
           document.querySelector('#nonce').value = payload.nonce;
           console.log(payload.nonce);
           payment.submit();
            });
        });
    });
</script>

@endsection

