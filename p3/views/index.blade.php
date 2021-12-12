@extends('templates.master')

@section('content')
    <h2 class='center margin'>Game of Gnomes (Gèam Gnomes)</h2>
    <p class='center'>Welcome (M'ath)</p>

    <form method='POST' action='/playername' id='playername'>

        @if ($player_name)
            <div class='alert alert-success'> Thank you, {{ $app->old('player_name') }} your name is registered.</div>
        @endif
        <div class='margin'>
            <label for='player_name'>Your Name</label>
            <input type='text' name='player_name' id='player_name' value='{{ $app->old('player_name') }}' placeholder=' *Required'>
            <input type='hidden' name='timein' value='{{ $timein }}'>
            <button type='submit' class='btn' id='playername'>Enter</button>
        </div>
    </form>
    <p class='detail'>*Min. length: 10; alpha-numeric characters, dashes, underscores only</p>

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

    @if ($app->errorsExist())
        <ul class='error alert alert-danger'>
            @foreach ($app->errors() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- Display Output of Results from AppController --}}
    @if ($competitor)
        <div class='results'>
            {{-- TESTING output check presence of values from AppController for index method while no persisted data values will be null --}}
            While data not yet stored if value is not null This is a blade if statement to test view {{ $turns }}, enter variable
            {{ $player_turn }} player turn integer will display if not null.
            {{ $playerSum }} player sum integer will display if not null.
            {{ $opponent_turn }} opponent turn integer will display if not null.
            {{ $opponent_sum }} opponent sum will display if not null.

            {{-- TESTING output with values (game played) --}}
            @if ($winner)
                <span class=''>Competitor Wins</span>
            @else
                <span class=''>Player Wins</span>
            @endif
    @endif
    <a href='/history'> View Game History (Faic eachdraidh geama) &rarr;</a>
@endsection
