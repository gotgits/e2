@extends('templates.master')

@section('title')
    Game History
@endsection

@section('content')
    <h2 class='center margin'>Game History (Eachdraidh geama)</h2>
        <ul>
            @foreach ($rounds as $round)
            <li><a href='/round?id='{{ $round['id'] }}'>{{ $round['timein']}}</a></li>
            @endforeach
        </ul>
    <p class='center'>&larr; <a href='/' class='center'>Return to Game (Till air ais chun gheama)</a></p>

@endsection
