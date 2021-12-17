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
        $results = $this->app->old('results');
        $timestamp = $this->app->old('timestamp');
        $id_turns = $this->app->old('id_turns');
        

        if ($timestamp) {
            $results = $this->app->db()->findByColumn('rounds', 'timestamp', '=', $timestamp);
            $results = $results[0]; # Narrow it down to the first row returned

            # Step 1) Create an array of each turn
            $results['player_turns'] = explode(',', $results['player_turns']);
            $results['opponent_turns'] = explode(',', $results['opponent_turns']);
            $results['id_turns'] = explode(',', $results['id_turns']);

            # Step) Create sub array of details of each turn
            $turns_player = [];
            foreach ($results['player_turns'] as $turn) {
                $turn = explode(',', $turn);
                if (!isset($turn[1])) {
                    $turn[1]="";
                } else {
                    $turn[1];
                }
                $turns_player[] = $turn;
            }
            $turns_opponent = [];
            foreach ($results['opponent_turns'] as $turn) {
                $turn = explode(',', $turn);
                if (!isset($turn[1])) {
                    $turn[1]="";
                } else {
                    $turn[1];
                }
                $turns_opponent[] = $turn;
            }

            $turns_id = [];
            foreach ($results['id_turns'] as $turn) {
                $turn = explode(',', $turn);
                if (!isset($turn[1])) {
                    $turn[1]="";
                } else {
                    $turn[1];
                }
                $turns_id[] = $turn;
            }

            $results['player_turns'] = $turns_player;
            $results['opponent_turns'] = $turns_opponent;
            $results['id_turns'] = $turns_id;
        }

        # show the results on page
        return $this->app->view('index', [
            'player_name' => $player_name,
            'timein' => $timein,
            'player_saved' => $player_saved,
            'competitor' => $competitor,
            'results' => $results,
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
        $results = [
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

        
        $results =[];
        $id = $this->app->param('id'); 
        $results['id'] = explode(',', $results['id']);
        $idAsString = '';
        foreach ($id as $turn) {
            $turnAsString = implode(",", $turn); # Convert each turn to a string
            $idsAsString .= $turnAsString . " |  ";
        }
        $idAsString = trim($idsAsString, ' |  '); # Remove last
        
        $round = $this->app->db()->findById('rounds', $results['id']);
        $round['id'] = explode(',', $round[$results['id']]); 
        

        
        // $id['round'] = explode(',', $id['round']);
        

            
            dump($results['id']);
            // dump($id);
            dump($timestamp);
            // dump($results['id_turns']);
            // dump($results['timestamp']);
        
            # show the results on page
        // return $this->app->view('round', [
        //     'id' => $id,
        //     'timestamp' => $timestamp,
        //     // 'results' => $results,
        //     // 'player_turns' => $player_turns,
        //     // 'opponent_turns' => $opponent_turns,
        //     // 'winner' => $winner,
        // ]);
        
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