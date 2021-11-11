{{-- @extends('templates.master')

@section('title')
{{ $welcome }}
@endsection

@section('content')

<h2>{{ $welcome }}</h2>

<p>Hello and welcome... This is the boilerplate splash page for my application built with <a href='https://github.com/susanBuck/e2framework'>e2framework</a>.</p>

@endsection --}}
@extends('templates/master')

@section('title')
    {{ $app->config('app.name') }}
@endsection

@section('content')
    <h2>Welcome!</h2>

    <p>
        {{ $app->config('app.name') }} is your one-stop-shop for convenient online grocery shopping in the greater Boston
        area.
    </p>

    <p>
        <a href='/products'>Check out our selection of products...</a>
    </p>
@endsection
