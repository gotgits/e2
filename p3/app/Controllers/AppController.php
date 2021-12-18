<?php

namespace App\Controllers;

class AppController extends Controller
{

    public function index()
    {
        # Player Log variables flash data
        $player_name = $this->app->old('player_name');
        $timein = $this->app->old('$timein');
        $player_saved = $this->app->old('player_saved');
        $competitor = $this->app->old('competitor');

        # If the game was just played, we'll have a "timestamp" in flash data
        # If it exists, use it to look up the results frmo the database
        $timestamp = $this->app->old('timestamp');
        if ($timestamp) {
            $round = $this->app->db()->findByColumn('rounds', 'timestamp', '=', $timestamp);
            $round = $round[0]; # Narrow it down to the first row returned

            # Decode the turn "arrays" that were stored as strings in the db
            $round['player_turns'] = $this->convertTurnsFromStringToArray($round['player_turns']);
            $round['opponent_turns'] = $this->convertTurnsFromStringToArray($round['opponent_turns']);
        }

        # Show the round on the page
        return $this->app->view('index', [
            'player_name' => $player_name,
            'timein' => $timein,
            'player_saved' => $player_saved,
            'competitor' => $competitor,
            'round' => $round ?? null,
        ]);
    }

    public function game()
    {
        # Intiailize variables
        $goal = 25;
        $player_sum = 0;
        $player_turns = [];
        $opponent_sum = 0;
        $opponent_turns = [];
        $timestamp = date('Y-m-d H:i:s');
       
        # Play the game
        while ($player_sum <= $goal && $opponent_sum <= $goal) {
   
            # Player
            $points = $this->getPoints(); # Helper function
            $player_sum += $points; # Accumulate points
            $player_turns[] = [$points, $player_sum]; # Build an array of turns, storing both the points and their sum
    
            # Opponent
            $points = $this->getPoints(); # Helper function
            $opponent_sum += $points; # Accumulate points
            $opponent_turns[] = [$points, $opponent_sum]; # Build an array of turns, storing both the points and their sum
        }
    
        # Player or opponent has reached goal; determine winner
        if ($player_sum >= $goal or $opponent_sum >= $goal) {
            $winner = $player_sum >= $goal ? 'Player' : 'Opponent';
        }

        # Array of Round data to insert into the database includes each "turn" details
        $round = [
            'timestamp' => $timestamp,
            'player_turns' => $this->convertTurnsFromArrayToString($player_turns),
            'opponent_turns' => $this->convertTurnsFromArrayToString($opponent_turns),
            'winner' => $winner
        ];

        # Insert the round data into the database
        $this->app->db()->insert('rounds', $round);

        # Redirect back to the homepage display the results
        $this->app->redirect('/', ['timestamp' => $timestamp]);
    }
    
    public function history()
    {
        $rounds = $this->app->db()->all('rounds');
        return $this->app->view('history', ['rounds' => $rounds]);
    }

    public function round()
    {
        # Get the id from the URL/query string
        $id = $this->app->param('id');

        # Retrieve the round data from the database
        $round = $this->app->db()->findById('rounds', $id);

        # Convert the turns data back to an array
        $round['player_turns'] = $this->convertTurnsFromStringToArray($round['player_turns']);
        $round['opponent_turns'] = $this->convertTurnsFromStringToArray($round['opponent_turns']);

        # Load the view, including the round data
        return $this->app->view('round', ['round' => $round]);
    }

    public function playerlog()
    {
        $this->app->validate([
            'player_name' => 'required|alphaNumericDash|minLength:10',
            ]);

        $id = $this->app->param('id');
        $player_name = $this->app->input('player_name');
        $competitor = $this->app->input('competitor');
        $timein = date('Y-m-d H:i:s');

        $this->app->db()->insert('players', [
            'id' => $id,
            'player_name' => $player_name,
            'competitor' => $competitor,
            'timein' => date('Y-m-d H:i:s')
            ]);

        $player = $player_saved;
        $players = $this->app->db()->all('players');
            
        $this->app->redirect('/', [
            'player_saved' => true,
            'id' => $this->app-> param('id'),
            'player_name' => $this->app->input('player_name'),
            'competitor' => $this->app->input('competitor'),
            'timein' => $this->app->input('timein')
            ]);
    }

    /**
     * Helper functions
     */
    public function convertTurnsFromArrayToString($turns)
    {
        $results = '';
        foreach ($turns as $turn) {
            $turnAsString = implode(",", $turn); # Convert each turn to a string
            $results .= $turnAsString . "|";
        }
        $results = trim($results, '|'); # Remove trailing |

        return $results;
    }

    public function convertTurnsFromStringToArray($turns)
    {
        $results = [];
        $turns = explode('|', $turns);
        
        foreach ($turns as $turn) {
            $turn = explode(',', $turn);
           
            $results[] = $turn;
        }

        return $results;
    }

    public function register()
    {
        $player_saved = $this->app->old('player_saved');
        $player = $player_saved;
        $players = $this->app->db()->all('players');
        return $this->app->view('register', ['players' => $players]);
    }

    private function getPoints()
    {
        # Create the points with conditions from the outcome of each "turn"
        # Utilized in the while loop which accumulates each "turn" until "goal or more"

        # Array of special numbers, keys=> are value that determine points,
        # The =>value is the random number that begins each turn
        $special_numbers = [
            11 => 5, # Magic
            6 => 4, # Bonus
            0  => 9, # Curse
            1 => 2, # Mystic
            15 => 7 # Wild
            ];
    
        $random_number = random_int(1, 10);
    
        # Check if random number generated is "special"
        $special_number = array_search($random_number, $special_numbers);
    
        return ($special_number) ? $special_number : $random_number;
    }
}