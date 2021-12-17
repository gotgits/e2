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
        $player_turns = $this->app->old('player_turns');
        $opponent_turns = $this->app->old('opponent_turns');
        $winner = $this->app->old('winner');
        $results = $this->app->old('results');

        # Game variables flash data
        $timestamp = $this->app->old('timestamp');
        if ($timestamp) {
            $results = $this->app->db()->findByColumn('rounds', 'timestamp', '=', $timestamp);
            $results = $results[0]; # Narrow it down to the first row returned

            # Step 1) Create an array of each turn
            $results['player_turns'] = explode(',', $results['player_turns']);
            $results['opponent_turns'] = explode(',', $results['opponent_turns']);

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
            foreach ($results['opponent_turns'] as $turn) {
                $turn = explode(',', $turn);
                if (!isset($turn[1])) {
                    $turn[1]="";
                } else {
                    $turn[1];
                }
                $turns_opponent[] = $turn;
            }

            $results['player_turns'] = $turns_player;
            $results['opponent_turns'] = $turns_opponent;
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
    
        while ($player_sum <= $goal && $opponent_sum <= $goal) {
    
            # Player
            $points = $this->getPoints(); # See the code for this function below
            $player_sum += $points; # Accumulate points
            $player_turns[] = [$points, $player_sum]; # Build an array of turns, storing both the points and their sum
    
            # Opponent
            $points = $this->getPoints(); # See the code for this function below
            $opponent_sum += $points; # Accumulate points
            $opponent_turns[] = [$points, $opponent_sum]; # Build an array of turns, storing both the points and their sum
        }
    
        if ($player_sum >= $goal or $opponent_sum >= $goal) {
            if ($player_sum >= $goal) {
                $winner = 'Player';
            } else {
                $winner = 'Opponent';
            }
        }

        # Build an array that contains full details of a "round" of the game
        # Details include each "turn" for each player/opponent that include points/sums
        
        $results = [
                'player_turns' => $player_turns,
                'opponent_turns' => $opponent_turns,
                'winner' => $winner,
            ];

        $playerTurnAsString = '';
        foreach ($player_turns as $turn) {
            $turnAsString = implode(",", $turn); # Convert each turn to a string
            
            $playerTurnAsString .= $turnAsString . " | Next roll: ";
        }
        $playerTurnAsString = trim($playerTurnAsString, ' | Next roll: '); # Remove pipe character from end


        $opponentTurnsAsString = '';
        foreach ($opponent_turns as $turn) {
            $turnAsString = implode(",", $turn); # Convert each turn to a string
                       
            $opponentTurnsAsString .= $turnAsString . " | Next roll: ";
        }
        $opponentTurnsAsString = trim($opponentTurnsAsString, ' | Next roll: '); # Remove pipe character from end

        $player_turns = $playerTurnAsString;
        $opponent_turns = $opponentTurnsAsString;



        // dump($player_turns);
        // dump($opponent_turns);
        // dump($results);

        $this->app->db()->insert('rounds', [
                'timestamp' => $timestamp,
                'player_turns' => $player_turns,
                'opponent_turns' => $opponent_turns,
                'winner' => $winner
        ]);

        $this->app->redirect('/', ['timestamp' => $timestamp]);
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
    

    public function history()
    {
        $rounds = $this->app->db()->all('rounds');
        // dump($rounds);
        return $this->app->view('history', ['rounds' => $rounds]);
    }

    public function round()
    {
        $id = $this->app->param('id');
        $player_turns = explode(",", $round->player_turns);  # This should yield an array of turns
        $opponent_turns = explode(",", $round->opponent_turns);
        
        $round = $this->app->db()->findById('rounds', $id);

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

    public function register()
    {
        $player_saved = $this->app->old('player_saved');
        $player = $player_saved;
        $players = $this->app->db()->all('players');
        return $this->app->view('register', ['players' => $players]);
    }
}