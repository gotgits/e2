<?php

namespace App\Controllers;

use App\Competitor;

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
        $turn = $this->app->old('turn');
        $timestamp = $this->app->old('player_saved');
        $player_turn = $this->app->old('player_turn');
        $opponent_turn = $this->app->old('opponent_turn');
        $player_sum = $this->app->old('player_sum');
        $opponent_sum = $this->app->old('opponent_sum');
        $turns = $this->app->old('turns');
        $player_turns = $this->app->old('player_turns');
        $opponent_turns = $this->app->old('opponent_turns');
        $winner = $this->app->old('winner');
        $results = $this->app->old('results');

        # show the results on page
        return $this->app->view('index', [
            'player_name' => $player_name,
            'timein' => $timein,
            'timestamp' => $timestamp,
            'player_saved' => $player_saved,
            'competitor' => $competitor,
            'turn' => $turn,
            'player_turn' => $player_turn,
            'opponent_turn' => $opponent_turn,
            'player_sum' => $player_sum,
            'opponent_sum' => $opponent_sum,
            'turns' => $turns,
            'results' => [
                'player_turns' => $player_turns,
                'opponent_turns' => $opponent_turns,
                'winner' => $winner,
            ]
        ]);
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
    
        $winner = ($player_sum >= $goal or $opponent_sum >= $goal) ? 'player' : 'opponent';
    
        # Build an array that contains full details of a "round" of the game
        # Details include each "turn" for each player/opponent that include points/sums
        $results = [
                'player_turns' => $player_turns,
                'opponent_turns' => $opponent_turns,
                'winner' => $winner,
            ];
        $id = $this->app->param('id');
        // $reviews = $this->app->db()->findByColumn('reviews', 'product_id', '=', $product['id']);

        $this->app->db()->insert('rounds', [
                'id' => $id,
                'timestamp' => date('Y-m-d H:i:s'),
                'player_turns' => $player_turns,
                'opponent_turns' => $opponent_turns,
                'winner' => $winner
            ]);
        
        $result = $result_saved;
        $round = $this->app->db()->findById('rounds', $id);
        $rounds = $this->app->db()->all('rounds');
        // $this->app->redirect('/', [
        //     'round' => true,
        //     'id' => $this->app-> param('id'),
        //     'results' => $results
        //     ]);
    
        // $this->app->redirect('/', [
        //         'round' => true,
        //         'id' => $this->app-> param('id'),
        //         'results' => $results(['round',
        //             'player_turns' => $player_turns,
        //             'opponent_turns' => $opponent_turns,
        //             'winner' => $winner
        //         ])
        //         'player_name' => $this->app->input('player_name'),
        //         'competitor' => $this->app->input('competitor'),
        //         'timein' => $this->app->input('timein')
        // ]);
    
        # Test that results contains the data we expect
        dump($results);
        // dump($rounds[$round]);
        // dump($round[$results]);
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
        
        $round = $this->app->db()->findById('rounds', $id);

        return $this->app->view('round', ['round' => $round]);
    }
}