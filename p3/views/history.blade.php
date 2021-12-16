@extends('templates.master')

@section('title')
    Game History
@endsection

@section('content')
    <h2 class='center margin'>Game History (Eachdraidh geama)</h2>
        <ul class='center'>
            @foreach ($rounds as $round)
            <li><a href='/round?id='{{ $round['id'] }}'>{{ $round['timestamp']}}</a></li>
            @endforeach
        </ul>
    <p class='center'>&larr; <a href='/' class='center'>Return to Game (Till air ais chun gheama)</a></p>

@endsection
