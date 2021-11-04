<?php

require __DIR__ . '/vendor/autoload.php';

use RPS\Game;

$game = new Game(true);

# Each invocation of the `play` method will play and track a new round of player (given move) vs. computer
$game->play('heads');

class MyGame extends Game
{
    protected $persistResults;
    private $maxResults;
    protected $sessionKey = 'GAME_RESULTS';
    protected $moves = ['heads', 'tails'];

    /**
     * Sets up game
     * $persistResults: Whether or not results should be stored to the SESSION
     * $maxResults: The max number of results to be stored to the session
     * $timezone: The timezone to use for the results timestamp
     */
    public function __construct(bool $persistResults = true, int $maxResults = 5, string $timezone = 'America/New_York')
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        date_default_timezone_set($timezone);

        if ($persistResults) {
            $this->maxResults = $maxResults;
            $this->persistResults = $persistResults;
        } else {
            $this->clearResults();
        }
    }


    /**
     * Compare a given $playerMove against a randomly chosen computer move
     * Returns an array of data with the results
     */
    public function play(string $playerMove)
    {
        if (!$this->validate($playerMove)) {
            die('Invalid move: ' . $playerMove);
        }

        $computerMove = $this->getRandomMove();

        $outcome = $this->determineOutcome($playerMove, $computerMove);

        $results = [
            'player' => $playerMove,
            'computer' => $computerMove,
            'outcome' => $outcome,
            'timestamp' => date('g:i:s a')
        ];

        if ($this->persistResults) {
            $this->persistResults($results);
        }
    }

    /**
     * Compares $playerMove against $computerMove and
     * determines whether player tied, won, or lost
     */
    protected function determineOutcome($playerMove, $computerMove)
    {
        if ($playerMove == 'heads' and $computerMove == 'tails') {
            'won';
        } else {
            'lost';
        }
    }


    /**
     * Retrieve the results from the session
     */
    public function getResults()
    {
        return $_SESSION[$this->sessionKey] ?? null;
    }


    /**
     * Clear the results from the session
     */
    public function clearResults()
    {
        $_SESSION[$this->sessionKey] = null;
    }


    /**
     * Persist the results to the session
     */
    private function persistResults(array $results)
    {
        # Get the existing session data
        $_SESSION[$this->sessionKey] = $this->getResults() ?? [];

        # Add these results to the start
        array_unshift($_SESSION[$this->sessionKey], $results);

        # Use array slice to make sure we're only includeing 0 up to maxResults
        $_SESSION[$this->sessionKey] = array_slice($_SESSION[$this->sessionKey], 0, $this->maxResults);
    }


    /**
     * Confirm the given move is valid
     */
    private function validate(string $playerMove)
    {
        return in_array($playerMove, $this->moves);
    }


    /**
     * Get a random move
     */
    private function getRandomMove()
    {
        return $this->moves[rand(0, count($this->moves) - 1)];
    }
}