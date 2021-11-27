@extends('templates/master')

@section('title')
    Game Rounds
@endsection

@section('content')
    <h2>Game Rounds</h2>
    {{-- comments with blade syntax will not show on the page rendered --}}
    {{-- @foreach ($products as $product)
        {{ $product['name'] }}
    @endforeach --}}
    {{-- <div id='product-index'>
        @foreach ($products as $product)
            <a class='product-link' href='/product?sku={{ $product['sku'] }}'>
                <div>
                    <div class='product-name'>{{ $product['name'] }}</div>
                    <img class='product-thumb' src="/images/products/{{ $product['sku'] }}.jpg">
                </div>
            </a>
        @endforeach
    </div> --}}

@endsection
