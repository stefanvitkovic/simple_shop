@extends('layouts.master')
@section('content')
<div class='row'>
	<div class='col-md-8 col-md-offset-2'>
	@foreach($products as $product)
		<div class='col-md-6' style="border: 2px solid red">
		{{$product->name}}
		</div>
	@endforeach
	</div>
</div>
@endsection