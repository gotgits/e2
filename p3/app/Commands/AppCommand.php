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
        $this->seedResult();
    }
    public function migrate()
    {
        $this->app->db()->createTable('players', [
            'player_name' => 'varchar(255)',
            'competitor' => 'varchar(255)',
            'timein' => 'timestamp'
        ]);


        $this->app->db()->createTable('rounds', [
            'player_name' => 'varchar(255)',
            'competitor' => 'varchar(255)',
            'timestamp' => 'timestamp',
            'player_turns' => 'int',
            'opponent_turns' => 'int',
            'winner' => 'varchar(255)',
        ]);

        $this->app->db()->createTable('result', [
            'player_turns' => 'int',
            'opponent_turns' => 'int',
            'winner' => 'varchar(255)',
        ]);
    }

    public function seedRounds()
    {
        $faker = Factory::create();

        for ($i = 10; $i > 0; $i--) {
            $round = [
                'timestamp' => $faker->dateTimeBetween('-' . $i . ' days', '-' . $i . ' days')->format('Y-m-d H:i:s'),
                'player_turns' => [random_int(0, 10)],
                'opponent_turns' => [random_int(0, 10)],
                'winner' => ['player', 'opponent'][rand(0, 1)],
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

    public function seedResult()
    {
        for ($i = 10; $i > 0; $i--) {
            $result_saved = [
                'player_turns' => [rand(0, 10)],
                'opponent_turns' => [rand(0, 10)],
                'winner' => ['player', 'opponent'][rand(0, 1)],
            ];
            $this->app->db()->insert('result', $result_saved);
        }
    }
}