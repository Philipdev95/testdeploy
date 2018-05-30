<?php

namespace App\Http\Controllers;

//use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

use Auth;

class GamesController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function oneTest($one){
      $one = 1;
      return $one;
    }
    public function index() {
      $results = app('db')->select("SELECT * FROM games");
      return view('games', ['result' => $results]);
    }
    public function get($id) {
      $games = app('db')->select("SELECT * FROM games WHERE games.id = $id");
      $reviews = app('db')->select("SELECT * FROM reviews WHERE gameId = $id");
      $games[0]->reviews = $reviews;
      return view('gamesDetails', ['result' => $games]);
    }

    public function delete($id) {
      app('db')->delete("DELETE FROM reviews WHERE reviews.gameId = $id");
      app('db')->delete("DELETE FROM games WHERE games.id = $id");
      //return view('start');
      return redirect('/games');
    }

    public function forgotPassword() {

    }

    public function addGame() {

    }

    public function updateGame() {

    }

    public function removeGame() {

    }

    public function getOwned(){
      $id = Auth::user()->id;
      $results = app('db')->select("SELECT * FROM games WHERE games.ownerId = $id");
      return view('profile', ['result' => $results]);
    }
}
