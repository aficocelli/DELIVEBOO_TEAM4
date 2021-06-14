@extends('layouts.app')

@section('content')
    <div class="container-sm">

      <h1>{{Auth::user()->restaurant_name }} ciao</h1>

    </div>
    
@endsection