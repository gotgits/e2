@extends('templates/master')

@section('title')
Product Not Found
@endsection

@section('content')
<h2>Product Not Found</h2>
<p>Sorry, we were not able to find the product you were seeking.</p>
{{-- {{ $missing }} --}}
<a href='/products'>&larr;Check out our other products...</a>
{{-- <a href='{{ $app->config('app.url') }}'>{{ $app->config('app.url') }}</a> --}}
@endsection