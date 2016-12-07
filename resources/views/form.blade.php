@extends('layouts.master')
@section('content')
<form method="POST" action="{{url('products')}}" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="products_name">Name</label>
    <input type="text" class="form-control" id="products_name" name='name' placeholder="Name">
  </div>
  <div class="form-group">
    <label for="products_name">Price</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="price">
  </div>
  <div class="form-group">
    <label for="products_name">Quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity">
  </div>
  <div class="form-group">
    <label for="products_description">Description</label>
    <textarea class="form-control" id="description" rows="3" name="description" placeholder="Description"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name="image" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection