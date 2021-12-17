@extends('templates.master')

@section('title')
    Game History
@endsection

@section('content')
    <h2 class='center margin'>Game History (Eachdraidh geama)</h2>
    <div class='center'>
        <ul class='left'>
            @foreach ($rounds as $round)
            <li><a href='/round?id='{{ $round['id'] }}'>Round: {{ $round['id'] }} – {{ $round['timestamp']}}</a></li>
            @endforeach
        </ul>
    </div>
    <p class='center'>&larr; <a href='/' class='center'>Return to Game (Till air ais chun gheama)</a></p>

@endsection
