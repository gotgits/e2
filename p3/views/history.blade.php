@extends('templates/master')

@section('title')
    {{ $app->config('app.name') }}
@endsection

@section('content')
    <h2>Round Results {{ $begin }}</h2>

    <p>
        {{ $app->config('app.name') }} See how the game is played for each round.
        <!-- This will be table data DATETIME or TIMESTAMP with links t each round -->
    </p>

    <p>
        <a href='/'>Return to Game</a>
    </p>
@endsection
