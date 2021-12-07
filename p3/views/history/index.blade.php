@extends('templates.master')

@section('title')
    Game History
@endsection

@section('content')
    <h2 class="center">Game History</h2>
    <p class="center">Eachdraidh</p>

    <div id='position-index'>
        @foreach ($positions as $position)
            <a class='history-link' href='/position?value={{ $position['value'] }}'>
                <div>
                    <div class='history-name'>{{ $position['name'] }}</div>
                    {{-- <img class='product-thumb' src="/images/products/{{ $product['sku'] }}.jpg"> --}}
                </div>
            </a>
        @endforeach
    </div>
    <a href='/> Return to Game &larr;</a>

@endsection
