@extends('templates.master')
{{-- @section('title')
    Game of Gnomes
@endsection --}}

@section('content')
    <h2 class='center margin'>Welcome (M'ath)</h2>

    <form method='POST' action='/playerlog' id='playerlog' class='center'>
        <input type='hidden' name='timein' value='{{ $timein }}'>
        <div>
            <p>Select which competitor you want to be.</p>
            <input type='radio' name='competitor' value='player'>
            <label for='player'>Player </label>
            <input type='radio' name='competitor' value='opponent' checked>
            <label for='competitor'>Opponent</label>
        </div>
        <div >
            @if ($app->errorsExist())
                <ul test='name-bad-input' test='validation-errors-alert' class='error alert alert-danger'>
                    @foreach ($app->errors() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            
             @if ($player_saved)
                <div test='validation-errors-alert' class='alert alert-success margin'> Thank you,&nbsp; {{ $app->old('player_name') }} your name is registered.</div>
            @endif

            <label for='player_name'>Name</label>
            <input test='name-input'  type='text' name='player_name' id='player_name' placeholder=' * Your Name' autofocus>
            
            <button test='submit-button' 'type='submit' class='btn' id='enter' class='inline'>Enter</button>
            <p class='detail'>*Name is required to play. 
            Min. length: 10 characters; <br>alpha-numeric, dashes, underscores only</p>
            <p class='center'><a href='/register' class='center'> View Registered Players Log </a> &rarr;</p>
        </div>      
    </form>
    <div class='center'>
        <form method='POST' action='/game' id='game'>
            <button test='submit-play-button' type='submit' name='play' id='play' value='play' class='btn'>Play Game!</button>
        </form>

            {{-- Display Output of Results from AppController --}}    
        @if($results)
        <div class='results'>
            <dl>
                <dt>Player turns:</dt>
                <dd>
                    @foreach($results['player_turns'] as $turn)
                         Roll: {{ $turn[0] }} Sum: {{ $turn[1] }}
                    @endforeach
                </dd>    

                <dt>Opponent turns:</dt>
                <dd>
                    @foreach($results['opponent_turns'] as $turn)
                        Roll: {{ $turn[0] }} Sum: {{ $turn[1] }}
                    @endforeach
                </dd>
                <dt>Winner:</dt> <dd>{{ $results['winner'] }}</dd>
            </dl>
        </div>
        @endif
        <p><a href='/history' class='center'> View Game History </a> &rarr;</p>
        <p class='details'>Faic eachdraidh geama</p>
    </div>
    <h3 class='left'>Game Instructions</h3>
    <ul class='left'>
        <li>Select Player or the Opponent</li>
        <li>Start the game by pressing "Play" which initiates a random number from 1-10 for moves toward the "Goal" which is 25</li>
        <li>The moves are recorded and accumulate sums for each turn</li>
        <li>Some numbers generated will produce special moves (positive and negative!)
            <ul>
                <li>Number 5 is "Magic" moves 11 instead</li>
                <li>Number 4 is "Bonus" moves 6 instead</li>
                <li>Number 9 is "Curse" moves 0 instead</li>
                <li>Number 2 is "Mystic" moves 1 instead</li>
                <li>Number 7 is "Wild" moves 15 instead</li>
            </ul>
        <li>"Turns" continue until the score reaches or exceeds the "Goal".</li>
        <li> Whomever reaches "Goal" first Wins!</li>
    </ul>
   
@endsection
