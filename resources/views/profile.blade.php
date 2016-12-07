@extends('layouts.master')
@section('content')
{{$sales}}
<hr>
<br>
<a href="{{url('products/create')}}" class='btn btn-primary'>Create</a>
@endsection