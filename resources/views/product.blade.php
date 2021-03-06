@extends('layouts.master')
@section('content')
<div class='col-md-2'>
	<p>Name: {{$info->name}}</p>
	<a href="{{route('profile',['id'=>$info->id])}}"><p><i>profile</i></p></a>
</div>
<div class='col-md-8'>
	<div class='col-md-4'>
		<img src={{url('images/'.$product->image.'.jpg')}}>
	</div>
	<div class='col-md-6'>
		<h2 data-id = {{$product->id}} id='product_id'>Name: {{$product->name}}</h2><hr>
		<p>Description: {{$product->description}}</p>
		<p>Quantity: 
		<select id='sel'>
			@for($i=1;$i<=$product->quantity;$i++)
			<option value = {{$i}}>{{$i}}</option>
			@endfor
		</select>
		</p>
		<h3 id='product_price' data-price = {{$product->price}}>Price: {{$product->price}}$</h3>
		@if(Auth::check() && $user !== $product->user_id)
		<a href="#" id='buy' class='btn btn-info'>Buy</a> 
		@elseif($user === $product->user_id)
		<a href="{{url('/')}}" class='btn btn-success'>Home</a>
		@else
		<a href="{{url('/login')}}" class='btn btn-primary'>Log In</a>
		@endif

	</div>
</div>
<!-- jQuery -->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

@endsection