@extends('templates.master')

@section('title')
    Player Registration Log
@endsection

@section('content')
    <h2 class='center margin'>Player Registration Log</h2>
    <p class='center'>&larr; <a href='/'> Return to Game (Till air ais chun gheama)</a></p>
    <div id='player'>
        @if (!$players)
            There are no players registered yet.
        @endif

        @foreach ($players as $player)
              <dl>
                <dt>{{ $player['player_name'] }}</dt>
                    <dd>{{ $player['competitor']}}</dd>
                    <dd>{{ $player['timein']}}</dd>
              </dl>
        @endforeach
    </div>
    

@endsection