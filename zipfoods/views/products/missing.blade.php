@extends('templates/master')

@section('title')
    Product Not Found
@endsection

@section('content')
    <h2 id="missing">Product Not Found</h2>
    <p>Sorry, we were not able to find the product you were seeking.</p>
    <a href='/products'>Check out our other products...</a>

@endsection
