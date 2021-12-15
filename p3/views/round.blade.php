@extends('templates.master')

@section('title')
    Round Details
@endsection

@section('content')
    <h2 class="center">Round Details (Cuairt)</h2>
        <dl>
            <dt>Round id: {{ $round['id']}}</dt> 
                <dd>Competitor name: {{ $round['player_name']}}</dd>
                <dd>Playing as: {{ $round['competitor']}}</dd>
            <dt>Player Turns:</dt>
                <dd>{{ $round['player_turn'] }}</dd>
                <dd>{{ $round['player_sum']}}</dd>
            <dt>Opponent Turns:</dt>
                <dd>{{ $round['opponent_turn'] }}</dd>
                <dd>{{ $round['opponent_sum'] }}</dd>  
            <dt>Results:</dt>
                <dd>Winner: {{ $round['winner'] }}</dd>
                <dd>Timestamp: {{ $round['timein']}}</dd>             
        </dl>
    <a href='/history' class='center'> &larr; Return to History (Till air ais gu eachdraidh) </a></p>

@endsection
