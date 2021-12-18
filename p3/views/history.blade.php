@extends('templates.master')

@section('title')
    Game History
@endsection

@section('content')
    <h2 class='center margin'>Game History (Eachdraidh geama)</h2>
    <p class='center margin game'>&larr; <a href='/' class='center'>Return to Game (Till air ais chun gheama)</a></p>
    <div>
        <ul class='center'>
            @foreach ($rounds as $round)
                <li class='left history'><a href='/round?id={{ $round['id'] }}'>Round: {{ $round['id'] }} – {{ $round['timestamp'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    

@endsection
