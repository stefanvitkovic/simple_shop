@extends('layouts.master')
@section('content')
<div class='row'>
	<div class='col-md-8 col-md-offset-2'>
	@foreach($products as $product)
		<div class='col-md-6' style="border: 0.5px solid #c8f442;border-radius: 4px;">
			<div class='col-md-6'>
				<img src={{url('images/'.$product->image.'.jpg')}} style="max-width:150px;"></div>
			<div class='col-md-4'>
				<a href="{{route('products',['id'=>$product->id])}}"><h3>{{$product->name}}</h3></a>
				<p>{{substr(strip_tags($product->description),0,20)}} {{ strlen(strip_tags($product->description))>20? "..." : ""}}</p>
				<a href="{{url('profile',['id'=>$product->user_id])}}"><p><i>{{$product->uname}}</i></p></a>
				<p><strong>{{$product->price}} $</strong></p>
			</div>
		</div>
	@endforeach
	</div>
</div>
@endsection