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

        # Game variables flash data
        $player_turns = $this->app->old('player_turns');
        $opponent_turns = $this->app->old('opponent_turns');
        $winner = $this->app->old('winner');
        $round = $this->app->old('round');
        $timestamp = $this->app->old('timestamp');
        $id_turns = $this->app->old('id_turns');
        

        if ($timestamp) {
            $round = $this->app->db()->findByColumn('rounds', 'timestamp', '=', $timestamp);
            $round = $round[0]; # Narrow it down to the first row returned

            # Step 1) Create an array of each turn
            $round['player_turns'] = explode(',', $round['player_turns']);
            $round['opponent_turns'] = explode(',', $round['opponent_turns']);
            $round['id_turns'] = explode(',', $round['id_turns']);

            # Step) Create sub array of details of each turn
            $turns_player = [];
            foreach ($round['player_turns'] as $turn) {
                $turn = explode(',', $turn);
                if (!isset($turn[1])) {
                    $turn[1]="";
                } else {
                    $turn[1];
                }
                $turns_player[] = $turn;
            }
            $turns_opponent = [];
            foreach ($round['opponent_turns'] as $turn) {
                $turn = explode(',', $turn);
                if (!isset($turn[1])) {
                    $turn[1]="";
                } else {
                    $turn[1];
                }
                $turns_opponent[] = $turn;
            }

            $turns_id = [];
            foreach ($round['id_turns'] as $turn) {
                $turn = explode(',', $turn);
                if (!isset($turn[1])) {
                    $turn[1]="";
                } else {
                    $turn[1];
                }
                $turns_id[] = $turn;
            }

            $round['player_turns'] = $turns_player;
            $round['opponent_turns'] = $turns_opponent;
            $round['id_turns'] = $turns_id;
        }

        # show the round on page
        return $this->app->view('index', [
            'player_name' => $player_name,
            'timein' => $timein,
            'player_saved' => $player_saved,
            'competitor' => $competitor,
            'round' => $round,
            'player_turns' => $player_turns,
            'opponent_turns' => $opponent_turns,
            'id_turns' => $id_turns,
            'winner' => $winner,
        ]);
    }

    public function game()
    {
        $goal = 25;
        $player_sum = 0;
        $player_turns = [];
        $opponent_sum = 0;
        $opponent_turns = [];
        $timestamp = date('Y-m-d H:i:s');
        $id = $this->app->param('id');
        $turn = 0;
        $id_turns = [];
       
    
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
    
        if ($player_sum >= $goal or $opponent_sum >= $goal) {
            if ($player_sum >= $goal) {
                $winner = 'Player';
            } else {
                $winner = 'Opponent';
            }
            # Turns id
            $id_turns = $this->app->$turn;  
        }

        # Build an array that contains full details of a "round" of the game
        # Details include each "turn" for each player/opponent that include points/sums
        $round = [
                'id' => $id,
                'player_turns' => $player_turns,
                'opponent_turns' => $opponent_turns,
                'id_turns' => $id_turns,
                'winner' => $winner,
            ];

        $playerTurnAsString = '';
        foreach ($player_turns as $turn) {
            $turnAsString = implode(",", $turn); # Convert each turn to a string
            $playerTurnAsString .= $turnAsString . " | Next roll: ";
        }
        $playerTurnAsString = trim($playerTurnAsString, ' | Next roll: '); # Remove last

        $opponentTurnsAsString = '';
        foreach ($opponent_turns as $turn) {
            $turnAsString = implode(",", $turn); # Convert each turn to a string
            $opponentTurnsAsString .= $turnAsString . " | Next roll: ";
        }
        $opponentTurnsAsString = trim($opponentTurnsAsString, ' | Next roll: '); # Remove last

        // $idTurnsAsString = '';
        // foreach ($id_turns as $turn) {
        //     $turnAsString = implode(",", $turn); # Convert each turn to a string
        //     $idTurnsAsString .= $turnAsString . " |  ";
        // }
        // $idTurnsAsString = trim($idTurnsAsString, ' |  '); # Remove last

        # Nested arrays as strings
        $player_turns = $playerTurnAsString;
        $opponent_turns = $opponentTurnsAsString;
        $id_turns = $idTurnsAsString;

        $this->app->db()->insert('rounds', [           
            'timestamp' => $timestamp,
            'id_turns' => $id_turns,
            'player_turns' => $player_turns,
            'opponent_turns' => $opponent_turns,           
            'winner' => $winner
        ]);

        $this->app->redirect('/', ['timestamp' => $timestamp]);
    }
    
    public function history()
    {
        $rounds = $this->app->db()->all('rounds');
        return $this->app->view('history', ['rounds' => $rounds]);
    }

    public function round()
    {    
        $id = $this->app->param('id');        
        $round = $this->app->db()->findById('rounds', $round['id']);
        $round['id'] = explode(',', $round[$round['id']]); 

        dump($round);
        
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

    public function register()
    {
        $player_saved = $this->app->old('player_saved');
        $player = $player_saved;
        $players = $this->app->db()->all('players');
        return $this->app->view('register', ['players' => $players]);
    }
}