@extends('layouts.app')

@section('pageTitle')
    Food's List
@endsection


@section('content')

{{-- advice alert --}}

@if (session('message'))
    <div class="alert alert-success" style="position: fixed; bottom: 30px; right: 30px">
        {{ session('message') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
    </div>
@endif

{{-- /advice alert --}}
<div class="d-flex flex-row container-sm justify-content-sm-between mt-5">
    <div class=" mb-3 text-left d-inline">
        <a href="{{route('home')}}">
                <button type="button" class="btn btn-primary ">Back Home</button>
        </a>
    </div>
    <div class="mb-3 d-inline">
        <a href="{{route('admin.foods.create')}}">
            <button type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i>Add Foods</button>
        </a>
    </div>
</div>  

    
    <table class="table table-striped container-sm">
        <thead>
            <tr>
                <th>Image</th>
                <th scope="col">Food's name</th>
                <th scope="col">Food's description</th>
                <th scope="col">Food's ingredients</th>
                <th scope="col">Food's price</th>
                <th scope="col">Vegan</th>
                <th scope="col">Available</th>
            </tr>
        </thead>
        <tbody>

            {{-- food's loop --}}
            @foreach ($foods as $food)
            <tr>
                <td><img src="{{$food->food_image ? asset('storage/' . $food->food_image) : 'http://lorempixel.com/400/200/food'}}" alt="{{$food->name_food}}" style="width: 100px"></td>
                
                <td>{{$food->name_food}}</td>

                <td>{{$food->description}}</td>
                
                <td>{{$food->ingredients}}</td>

                <td>{{$food->price}}</td>

                <td>{!! $food->vegan ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times-circle"></i>'!!}</td>
                
                <td>{!! $food->available ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times-circle"></i>'!!}</td>
                
                <td>    
                    <a href="{{route('admin.foods.edit', [ 'food' => $food->id ])}}"><button type="button" class="btn btn-info"><i class="fas fa-pencil-alt"></i></button></a> 
                    <form action="{{route('admin.foods.destroy', [ 'food' => $food->id ])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2 inline"><i class="fas fa-trash"></i></button>
                    </form>  
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>

{{-- cdn vuejs --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>		  
<script src="{{asset('js/newScript.js')}}"></script>
@endsection