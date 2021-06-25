<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Deliveboo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="{{ asset('css/script.css') }}" rel="stylesheet">
        
    </head>

    <body>
        <div class="container text-center" style="margin-top: 20px; width:700px;">
            <div style="background-color: #FF9900; text-align:center; color: #fff; padding:30px 0; border-radius:20px">
                <img src="{{asset('img-carousel/dropfood-logo-white.svg')}}" alt="Dropfood" style ="width: 200px; height:100px;">
                <h1 style="font-weight: bold;" class="font-weight-bold text-white">dropfood</h1>
            </div>
            <h2 class="mt-3 text-center" style= "font-family: 'Permanent Marker', cursive;">Gentile <span> Francesca Petraroia</span> il suo ordine è confermato!</h2> 
            
            <div class="d-flex justify-content-start container-sm mt-5 mb-5" style="background-color: #FF9900; text-align:center; padding:30px 0; border-radius:20px">     
            
               <h4><strong>Numero ordine:</strong> N. {{$order->id}}</h4>
              <h4><strong>Nome cliente:</strong> </strong><span style="text-transform:capitalize;">{{$order->fullname_guest}}</span></h4>
              <h4><strong>Recapito telefonico:</strong> </strong>{{$order->phone_guest}}</h4>
              <h4><strong>Indirizzo:</strong><span style="text-transform:capitalize;">{{$order->address_guest}}</span></h4>
              <h4><strong>Email:</strong> {{$order->email_guest}}</h4>
              <h4><strong>Data ordine:</strong> {{date("H:i d-m-Y")}}</h4>
              <h4><strong>Tipo di consegna:</strong> {{$order->delivery_type}}</h4>
              <h4><strong>Orario di consegna:</strong> {{date("H", strtotime('+4 hours'))}}:30</h4>
              <h4><strong>Totale ordine:</strong> {{$order->total}} € </h4>
            </div>
        </div>
    </body>
</html>

 










      
    
      
