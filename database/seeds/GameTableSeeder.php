<?php

use Illuminate\Database\Seeder;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('games')->insert([
        [
          'name' => "Super mario!",
          'price' => 99,
          'description' => str_random(50),
          'ownerId' => 1,
          'image' => 'https://cdn.images.dailystar.co.uk/dynamic/184/photos/334000/620x/Super-Mario-Level-Up-Boardgame-605999.jpg'
        ],
        [
          'name' => "Star Wars",
          'price' => 199,
          'description' => str_random(50),
          'ownerId' => 1,
          'image' => 'https://starwarsblog.starwars.com/wp-content/uploads/2015/10/tfa_poster_wide_header-1536x864-959818851016.jpg'
        ],
        [
          'name' => "Star wars 2",
          'price' => 220,
          'description' => str_random(50),
          'ownerId' => 4,
          'image' => 'https://starwarsblog.starwars.com/wp-content/uploads/2015/10/tfa_poster_wide_header-1536x864-959818851016.jpg'
        ],
        [
          'name' => "Super Mario 2",
          'price' => 199,
          'description' => str_random(50),
          'ownerId' => 2,
          'image' => 'https://cdn.images.dailystar.co.uk/dynamic/184/photos/334000/620x/Super-Mario-Level-Up-Boardgame-605999.jpg'
        ],
        [
          'name' => "Super Mario 4",
          'price' => 199,
          'description' => str_random(50),
          'ownerId' => 3,
          'image' => 'https://cdn.images.dailystar.co.uk/dynamic/184/photos/334000/620x/Super-Mario-Level-Up-Boardgame-605999.jpg'
        ],
        [
          'name' => "Player Unknowns BattleGround",
          'price' => 399,
          'description' => str_random(50),
          'ownerId' => 1,
          'image' => 'https://cdn.images.express.co.uk/img/dynamic/143/590x/PUBG-886916.jpg'
        ],
        [
          'name' => "Super Mario 38",
          'price' => 699,
          'description' => str_random(50),
          'ownerId' => 2,
          'image' => 'https://cdn.images.dailystar.co.uk/dynamic/184/photos/334000/620x/Super-Mario-Level-Up-Boardgame-605999.jpg'
        ]
    ]);
    }
}
