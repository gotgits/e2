<?php

namespace App\Commands;

use Faker\Factory;

class AppCommand extends Command
{
    public function fresh()
    {
        $this->migrate();
        $this->seedPlayers();
        $this->seedRounds();
    }
    public function migrate()
    {
        $this->app->db()->createTable('players', [
            'player_name' => 'varchar(255)',
            'competitor' => 'varchar(255)',
            'timein' => 'timestamp'
        ]);

        $this->app->db()->createTable('rounds', [
            'timestamp' => 'timestamp',
            'player_turns' => 'varchar(255)',
            'opponent_turns' => 'varchar(255)',
            'winner' => 'varchar(255)',
        ]);
    }

    public function seedRounds()
    {
        $faker = Factory::create();

        for ($i = 10; $i > 0; $i--) {
            $round = [
                'timestamp' => $faker->dateTimeBetween('-' . $i . ' days', '-' . $i . ' days')->format('Y-m-d H:i:s'),
                'player_turns' => implode(',', [random_int(1, 10)]), # SB: Convert the array to a string of comma separated values
                'opponent_turns' => implode(',', [random_int(1, 10)]), # SB: Convert the array to a string of comma separated values
                'winner' => ['Player', 'Opponent'][rand(0, 1)]
            ];
            
            $this->app->db()->insert('rounds', $round);
        }
        // dump('rounds table has been seeded');
    }
    
    public function seedPlayers()
    {
        $faker = Factory::create();

        for ($i = 10; $i > 0; $i--) {
            $player_saved = [
                'player_name' => $faker->name,
                'competitor' => ['player', 'opponent'][rand(0, 1)],
                'timein' => $faker->dateTimeBetween('-' . $i . ' days', '-' . $i . ' days')->format('Y-m-d H:i:s') # DateTime
            ];
            # Insert the player name, competitor selection, and timestamp
            $this->app->db()->insert('players', $player_saved);
        }
    }
}