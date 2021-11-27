 <?php
       class Player
       {
           public $sum = 0;
           public $name;
           public $wins = false;
           public $goal = 25;

           public function __construct($name)
           {
               $this->name = $name;
           }
           public function turns()
           {
               $turn = random_int(1, 5);
               // each $turn increases the sum
               $this->sum += $turn;
               // status check
               $this->wins = $this->sum >= $goal;
           }
       }