@extends('templates.master')

@section('title')
    Round Details
@endsection

@section('content')
    <h2 class="center">Round Details (Cuairt)</h2>
    {{-- <h3></h3> --}}
        <dl>  
            <dt>Round: {{ $results['id'] }}</dt>                    
                <dd>Timestamp: {{ $results['timestamp']}}</dd>   
            {{-- <dt class='left'>Player turn:</dt>
                <dd class='inline'>
                    @foreach($results['player_turns'] as $turn)
                        {{ $turn[0] }} → {{ $turn[1] }} 
                    @endforeach
                </dd>    

                <dt class='left'>Opponent turn:</dt>
                <dd class='inline'>
                    @foreach($results['opponent_turns'] as $turn)
                       {{ $turn[0] }} →  {{ $turn[1] }}
                    @endforeach
                </dd>
                <dt class='left'>Winner: {{ $results['winner'] }}</dt>            --}}
        </dl>
    <a href='/history' class='center'> &larr; Return to History (Till air ais gu eachdraidh) </a></p>

@endsection

            
