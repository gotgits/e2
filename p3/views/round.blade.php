@extends('templates.master')

@section('title')
    Round Details
@endsection

@section('content')

    <h2 class="center margin">Round Details (Cuairt)</h2>

    <p class='center history'><a href='/history' class='center'> &larr; Return to History (Till air ais gu eachdraidh) </a>
    </p>

    <dl class='rounds'>
        <dt>Round: {{ $round['id'] }}</dt>
        <dd>Timestamp: {{ $round['timestamp'] }}</dd>
        <dt class='left'>Player turn:</dt>
        <dd class='inline'>
            @foreach ($round['player_turns'] as $turn)
                Roll: {{ $turn[0] }} → {{ $turn[1] }}<br>
            @endforeach
        </dd>

        <dt class='left'>Opponent turn:</dt>
        <dd class='inline'>
            @foreach ($round['opponent_turns'] as $turn)
                Roll: {{ $turn[0] }} → {{ $turn[1] }}<br>
            @endforeach
        </dd>
        <dt class='left winner'>Winner: {{ $round['winner'] }}</dt>
    </dl>

@endsection
