<?php

namespace App\Http\Controllers;

//use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Auth;

use Log;
class UsersController extends BaseController
{

  public function index() {
    $results = app('db')->select("SELECT * FROM users");
    return $results;
  }


    public function get($id) {
      $results = app('db')->select("SELECT * FROM users WHERE id = $id");
/*
      $resultArray = json_decode($results);
      $username = var_dump($resultArray->username);
      return view('user', ['username' => $username]);

      $json = (array) json_decode($results);
      $username = $json[0]['username'];
      return view('user', ['username' => $username]);*/
      //return $json;
      return $results;
      // return view('user', ['username' => 'Username'], ['id' => 'ID']);
    }

    public function delete($id) {
      app('db')->delete("DELETE FROM `reviews` WHERE reviews.userId = $id");
      $results = app('db')->select("SELECT * FROM games WHERE ownerId = $id");
      foreach ($results as $game) {
          app('db')->delete("DELETE FROM `reviews` WHERE reviews.gameId = $game->id");
      }
      app('db')->delete("DELETE FROM `games` WHERE games.ownerId = $id");
      app('db')->delete("DELETE FROM `users` WHERE users.id = $id");
      return redirect('/');
    }

    public function add(Request $request) {
      $username = $request->input("username");
      $password = $request->input("password");
      $credits = 500;
      app('db')->insert("INSERT INTO `users`(`username`, `password`, `credit`) VALUES ('$username', '$password', $credits)");
    }

    public function update(Request $request) {
      $username = $request->input("username");
      $password = $request->input("password");
      $credits = 500;
      DB::table("users")
              ->where("id", Auth::id())
              ->update(["username" => $username, "password" => Hash::make($password)]);
    }

}
