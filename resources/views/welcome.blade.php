@extends('layouts.master')
@section('content')
<div class='row'>
	<div class='col-md-8 col-md-offset-2'>
	@foreach($products as $product)
		<div class='col-md-6' style="border: 0.5px solid gray;border-radius: 4px;">
		<a href="{{route('products',['id'=>$product->id])}}">{{$product->name}}</a>
		</div>
	@endforeach
	</div>
</div>
@endsection