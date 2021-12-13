@extends('templates.master')

@section('title')
    Player Registration Log
@endsection

@section('content')
    <h2 class='center margin'>Player Registration Log</h2>
    <div id='player'>
       

        @if (!$player_saved)
            There are no players registered yet.
        @endif

        @foreach ($players as $player_saved)
            <div class='table'>
              <dl>
                <dt>
                </dt>
                    <dd>
                    </dd>
              </dl>
            </div>
        @endforeach
    </div>
    <p class='center'>&larr; <a href='/'> Return to Game (Till air ais chun gheama)</a></p>

@endsection
