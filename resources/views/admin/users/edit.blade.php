@extends('layouts.app')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


@section('content')
  <div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
	@endif
  
    {{-- <form action="{{route('admin.users.update', ['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name_restaurant">Nome del ristorante</label>
        <input type="text" class="form-control" id="name_restaurant" name="name_restaurant" placeholder="name_restaurant" value="{{$user->name_restaurant}}">
      </div>
    </form> --}}
  </div>

@endsection