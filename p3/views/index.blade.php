@extends('templates/master')

@section('title')
    {{ $app->config('app.name') }}
@endsection

@section('content')
    <h2>Take turns to reach the end before your opponent (computer moves)</h2>

    <p>
        {{ $app->config('app.name') }} Race to the goal
    </p>

    <p>
        <a href='/'>Return to Game</a>
    </p>
@endsection
