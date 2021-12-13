<?php

namespace App\Commands;

use Faker\Factory;

class AppCommand extends Command
{
    public function fresh()
    {
        $this->migrate();
        $this->seedPlayers();
    }
    public function migrate()
    {
        $this->app->db()->createTable('players', [
            'player_name' => 'varchar(255)',
            'competitor' => 'varchar(255)',
            'timein' => 'timestamp'
        ]);

        // $this->app->db()->createTable('rounds', [
        //     'turn' => 'int',
        //     'player_turn' => 'int',
        //     'player_sum' => 'int',
        //     'opponent_turn' => 'int',
        //     'opponent_sum' => 'int',
        //     'winner' => 'varchar(255)',
        //     'timestamp' => 'timestamp'
        // ]);
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
            # Insert the player name and timestamp registered
            $this->app->db()->insert('players', $player_saved);
        }
        // dump('players table has been seeded');
    }
}