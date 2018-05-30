<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
          'username' => "helloworld",
          'password' => '$2y$10$LN7T3UvOAPmksm9Dryf5tOM6jgWtXf2B9bPKKME0x86Oh2gOA5H4q',
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "oscara96",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "philipDev",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "rick",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "morty",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "antonT",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "johanH",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "användarnamn",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "blåElefant",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "blackPanther",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "ironMan",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ],
        [
          'username' => "rosaElefant",
          'password' => str_random(10),
          'credit' => 500,
          //'gamesOwned' => [1]
        ]
    ]);
    }
}
