@extends('templates.master')

@section('content')
    <h2 class='center margin'>Game of Gnomes (Gèam Gnomes)</h2>
    <p class='center'>Welcome (M'ath)</p>

    <form method='POST' action='/register' id='register'>
        @if ($playerNameSaved)
            <div class='alert alert-success'> Thank you, {{ $playerName }} your name is registered.</div>
        @endif
        <div class='margin'>
            <label for='playerNname'>Your Name</label>
            <input test='player-name-input' type='text' name='playerName' id='playerName' value='{{ $app->old('playerName') }}'
                placeholder=' *Required'>
            <button test='playerName-submit-button' type='submit' class='btn' id='register'>Enter</button>
            <!-- TODO: Display input name on index-view -->
        </div>
    </form>
    <p class='detail'>*Min. length: 10 alpha-numeric characters, dashes, underscores</p>
    @if ($app->errorsExist())
        <ul class='error alert alert-danger'>
            @foreach ($app->errors() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method='POST' action='/game' id='game'>
        <input type='radio' name='competitor' value='player'>
        <label for='player'>Player</label>
        <input type='radio' name='competitor' value='opponent'>
        <label for='competitor'>Opponent</label>
        <button type='submit' name='play' id='play' value='play' class='btn'>Play!</button>
    </form>
    <h3 class='left'>Game Instructions</h3>
    <ul class='left'>
        <li>Select to be either the Player or the Opponent</li>
        <li>Start the game by pressing "Play" which initiates a random number from 1-10 for moves toward the "Goal" which is 25</li>
        <li>Each "Turn" records the accumulating sums of each turn</li>
        <li>Some numbers generated will produce an alternate response
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
    {{-- Display Output of Results from AppController --}}
    @if ($competitor)
        <div class='results'>
            {{-- TESTING output check presence of values from AppController for index method while no persisted data values will be null --}}
            While data not yet stored if value is not null This is a blade if statement to test view {{ $turns }}, enter variable
            {{ $playerTurn }} player turn integer will display if not null.
            {{ $playerSum }} player sum integer will display if not null.
            {{ $opponentTurn }} opponent turn integer will display if not null.
            {{ $opponentSum }} opponent sum will display if not null.

            {{-- TESTING output with values (game played) --}}
            @if ($winner)
                <span class=''>Competitor Wins</span>
            @else
                <span class=''>Player Wins</span>
            @endif
    @endif
    <a href='/history'> View Game History (Faic eachdraidh geama) &rarr;</a>
@endsection
