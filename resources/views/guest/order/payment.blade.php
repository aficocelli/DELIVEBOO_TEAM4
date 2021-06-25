@extends('layouts.guest-order')

@section('pageTitle')
    Deliveboo | Pagamento
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.min.js"></script>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <title>Document</title>
</head>
<body>
 <div class="container">
    <div id="dropin-container"></div>
  <button id="submit-button">Request payment method</button>
 </div>
  
<script src="{{asset('js/payment.js')}}"></script>
</body>
</html>


  
  
  

