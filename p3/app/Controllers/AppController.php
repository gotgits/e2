<?php

namespace App\Controllers;

use App\Competitor;

class AppController extends Controller
{
    public function index()
    {

        # flashing data to create confirmation message once
        $player_name = $this->app->old('player_name');
        $timein = $this->app->old('$timein');

        # Access flashed data from database
        $competitor = $this->app->old('competitor');
        // $play = $this->app - old('play');
        $turn = $this->app->old('turn');
        $player_turn = $this->app->old('player_turn');
        $opponent_turn = $this->app->old('opponent_turn');
        $player_sum = $this->app->old('player_sum');
        $opponent_sum = $this->app->old('opponent_sum');
        $turns = $this->app->old('turns');
        $results = $this->app->old('results');

        # show the results on page
        return $this->app->view('index', [
            'player_name' => $player_name,
            'timein' => $timein,
            'competitor' => $competitor,
            // 'play' => $play,
            'turn' => $turn,
            'player_turn' => $player_turn,
            'opponent_turn' => $opponent_turn,
            'player_sum' => $player_sum,
            'opponent_sum' => $opponent_sum,
            'turns' => $turns,
            'results' => $results

        ]);
        // dump($player_name);
    }

    public function playername()
    {
        $this->app->validate([
            'player_name' => 'required|alphaNumericDash|minLength:10',
        ]);
        $player_name = $this->app->input('player_name');
        $timein = date('Y-m-d H:i:s');
        // $this->app->db()->insert('players', [
        //     'timein' => date('Y-m-d H:i:s'),
        // ]);


        $this->app->db()->insert('players', [
            'player_name' => $player_name,
            'timein' => date('Y-m-d H:i:s')
        ]);

        // return $this->app->redirect('/');
        # TODO: Display input name on index.blade persisted by db()
        dump($player_name);
        dump($timein);
    }
    public function register()
    {
        $player_name = $this->app->input('player_name');
        // $timein = date('Y-m-d H:i:s');
        $registered_player = ['players', [
            'player_name' => $player_name,
            'timein' => date('Y-m-d H:i:s') # DateTime
        ]];
        # Insert the player name and timestamp registered
        $this->app->db()->insert('players', $registered_player);
    }

    public function game()
    {
        $this->app->validate([
            'competitor' => 'required'
        ]);
        // dump($this->app->inputAll());
        $competitor = $this->app->input('competitor');
        $turn = $this->app->input('turn');
        $playerSum = 0;
        $opponentSum = 0;
        $goal = 25;
        // $turn = 0;

        $results = [];
        $turns = [];

        $magic = 11;
        $bonus = 6;
        $curse = 0;
        $mystic = 1;
        $wild = 15;


        while ($turn = $playerSum < $goal && $opponentSum < $goal) {
            $turnP = random_int(1, 10);
            # calculating playerTurn with conditional variables to effect the outcome
            if ($sumP = $turnP) {
                if ($turnP == 5) {
                    $sumP = $magic;
                } elseif ($turnP == 4) {
                    $sumP = $bonus;
                } elseif ($turnP == 9) {
                    $sumP = $curse;
                } elseif ($turnP == 2) {
                    $sumP = $mystic;
                } elseif ($turnP == 7) {
                    $sumP = $wild;
                } else {
                    $sumP = $turnP;
                }
            }
            $playerTurn = $sumP;
            $playerSum += $playerTurn;
            if ($playerSum >= $goal) {
            }

            $turnOp = random_int(1, 10);
            # calculating opponentTurn with conditional variables to effect the outcome
            if ($sumOp = $turnOp) {
                if ($turnOp == 5) {
                    $sumOp = $magic;
                } elseif ($turnOp == 4) {
                    $sumOp = $bonus;
                } elseif ($turnOp == 9) {
                    $sumOp = $curse;
                } elseif ($turnOp == 2) {
                    $sumOp = $mystic;
                } elseif ($turnOp == 7) {
                    $sumOp = $wild;
                } else {
                    $sumOp = $turnOp;
                }
            }
            $opponentTurn = $sumOp;
            $opponentSum += $opponentTurn;
            // checking round results for goal(winner Opponent)
            if ($opponentSum >= $goal) {
                // echo $opponentTurn." ".$competitorSum;
            }
            $play = $turn;
            $turn = count($turns) + 1;

            if ($winner = $playerSum >= $goal or $opponentSum >= $goal) {
                if ($playerSum >= $goal) {
                    $winner = 'Player';
                } else {
                    $winner = 'Opponent';
                }
                // return $winner;
            }

            // $winner = $competitor == $play;
            // $turn = count($turns) + 1;
            array_push(
                $results,
                array(
                    'turn' => $turn,
                    'turns' => $turns,
                    'playerTurn' => $playerTurn,
                    'playerSum' => $playerSum,
                    'opponentTurn' => $opponentTurn,
                    'opponentSum' => $opponentSum,
                    'winner' => $winner,
                )
            );
        }
        // dump($competitor);
        // dump($play);
        // dump([$turns]);
        // dump($turn = [$turnP, $turnOp]);
        // dump($playerTurn);
        // dump($playerSum);
        // dump($opponentTurn);
        // dump($opponentSum);
        // dump($winner);


        //$this->app->db()->insert('rounds', [
        //     'competitor' => $competitor,


        //     'winner' => $winner,
        //     'timestamp' => date(''Y-m-d H:i:s')
        // ]);
    }
    public function history()
    {
        return $this->app->view('history');
    }

    public function round()
    {
        return $this->app->view('round');
    }
}