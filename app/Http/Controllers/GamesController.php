<?php

namespace App\Http\Controllers;

//use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

class GamesController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function index() {
      $results = app('db')->select("SELECT * FROM games");
      return view('games', ['result' => $results]);
    }

    public function get($id) {
      $games = app('db')->select("SELECT * FROM games WHERE games.id = $id");
      $reviews = app('db')->select("SELECT reviews.reviewId, games.name, reviews.userId, reviews.gameId, reviews.rating, reviews.review, reviews.createdAt, users.username FROM reviews INNER JOIN users ON reviews.userId = users.id INNER JOIN games on reviews.gameId = games.id WHERE reviews.gameId = $id");
      $games[0]->reviews = $reviews;
      return view('gamesDetails', ['result' => $games]);
    }

    public function delete($id) {
      app('db')->delete("DELETE FROM reviews WHERE reviews.gameId = $id");
      app('db')->delete("DELETE FROM games WHERE games.id = $id");
      //return view('start');
      return redirect('/myprofile');
    }

    public function add(Request $request) {

      $this->middleware("auth");
      $gameName = $request->input("title");
      $gameDesc = $request->input("description");
      $gamePrice = $request->input("price");
      $gameImage = $request->input("image");
      $gameOwner = Auth::user()->id;

      app('db')->insert("INSERT INTO `games`(`name`, `description`, `price`, `ownerId`, `image`) VALUES ('$gameName', '$gameDesc', $gamePrice, $gameOwner, '$gameImage')");
      return redirect("/myprofile");
    }

    public function update($id ,Request $request) {
      $title = $request->input("title");
      $description = $request->input("description");
      $price = $request->input("price");

      DB::table("games")
              ->where("id", $id)
              ->update(["name" => $title, "description" => $description, "price"=> $price]);

      return redirect('/myprofile');
    }


    public function getOwned(){
      $id = Auth::user()->id;
      $results = app('db')->select("SELECT * FROM games WHERE games.ownerId = $id");
      return view('profile', ['result' => $results]);
    }
}
