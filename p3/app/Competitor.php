<?php

namespace App;

class Competitor
{
    # Properties
    public $turn;
    public $sum;
    public $move;
    public $magic;
    public $bonus;
    public $curse;
    public $mystic;
    public $wild;
    public $competitor;
    public $turns;


    # Methods
    public function __construct($competitor, int $turns, int $turn, int $sum)
    {
        $this->competitor = $competitor;
        $this->turns = $turns;
        $this->turn = $turn;
        $this->sum = $sum;
    }

    public function move()
    {
        $this->turn = 0;
        $this->sum = 0;
        if ($this->turn == random_int(1, 10)) {
            if ($this->turn == 5) {
                if ($this->magic = 11) {
                    return 'sum';
                } elseif ($this->turn == 4) {
                    if ($this->bonus = 6) {
                        return 'sum';
                    } elseif ($this->turn == 8) {
                        if ($this->curse = 0) {
                            return 'sum';
                        } elseif ($this->turn == 2) {
                            if ($this->mystic = 9) {
                                return 'sum';
                            }
                        } elseif ($this->turn == 7) {
                            if ($this->wild = 15) {
                                return 'sum';
                            }
                        } else {
                            return 'sum';
                        }
                    }
                }
            }
        }
    }

    //public function getTurn(string $competitor, int $move) 
    public function getTurn()
    {
        $this->move('competitor');
        $competitor = $this->turn + $this->sum;
        $turns = $competitor;
        return $turns;
    }
}
// Create instance
$player = new Competitor(1);
$player->move();
$player->getTurn();
$opponent = new Competitor(2);
$opponent->move();
$opponent->getTurn();
$opponent->move();