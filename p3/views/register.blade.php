@extends('templates.master')

@section('title')
    Game History
@endsection

@section('content')
    <h2 class="center">Game of Gnomes (Gèam Gnomes)</h2>
    <p class="center">Gèam Gnomes</p>
    <h3 class="center">Game History (Eachdraidh geama)</h3>

    <div id='player'>
        <h4>Players Registered</h4>

        @if (!$registered_player)
            There are no players registered yet.
        @endif

        @foreach ($players as $registered_player)
            <div class='table'>
                <ul>
                    <li class='table'>{{ $players['player_name'] }}</li>
                    <li class='table'>{{ $players['timein'] }}</li>
            </div>
        @endforeach
    </div>
    <a href='/>&larr; Return to Game (Till air ais chun gheama)</a>

@endsection
