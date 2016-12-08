@extends('layouts.master')
@section('content')
<div class='row'>
	<div class='col-md-2'>
	<p class='text-center'>Info</p>
	<p>Name: {{$user->name}}</p>
	</div>
	<div class='col-md-8'>
	<h3>Products on sale:</h3>
		<table class="table table-hover">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Description</th>
		        <th>Price</th>
		        <th>Quantity</th>
		        <th>Created at</th>
		      </tr>
		    </thead>
		    <tbody>
		    @foreach($sales as $sale)
		      <tr>
		        <td>{{$sale->name}}</td>
		    	<td>{{substr(strip_tags($sale->description),0,20)}} {{ strlen(strip_tags($sale->description))>20? "..." : ""}}</td>
		    	<td>{{$sale->price}}</td>
		    	<td>{{$sale->quantity}}</td>
		    	<td>{{$sale->created_at}}</td>
		    	@if(Auth::id() === $sale->user_id)
		    	<td><a href="{{ route('products',['id' => $sale->id]) }}" class='btn btn-default'>View</a>
                <a href="{{ route('del',['id'=>$sale->id]) }}" class='btn btn-danger'>Delete</a></td>
                @endif
		      </tr>
		    @endforeach
		    </tbody>
		  </table>
		<hr>
	</div>
<br>
	<div class='col-md-8 col-md-offset-2'>
	<h3>Purchases:</h3>
		<table class="table table-hover">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Description</th>
		        <th>Price</th>
		        <th>Quantity</th>
		        <th>Created at</th>
		      </tr>
		    </thead>
		    <tbody>
		    @foreach($purchases as $purchase)
		      <tr>
		        <td>{{$purchase->name}}</td>
		    	<td>{{substr(strip_tags($purchase->description),0,20)}} {{ strlen(strip_tags($purchase->description))>20? "..." : ""}}</td>
		    	<td>{{$purchase->price}}</td>
		    	<td>{{$purchase->quantity}}</td>
		    	<td>{{$purchase->created_at}}</td>
		      </tr>
		    @endforeach
		    </tbody>
		</table>
	<hr>
	</div>
</div>
	<br>
	
@endsection