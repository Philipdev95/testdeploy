<!-- Stored in resources/views/user.blade.php -->

@extends('layouts.layout')
@section('title', 'Profile')

@section('content')

<div class="row">
  <div class="col-12 col-md-6 text-center p-3">
    <h4 class="text-uppercase font-weight-superlight">Profile</h4>
    <form action=<?php echo "/api/users/" . Auth::id() ?> method="POST" id="updateProfile">
      {{ method_field('PUT') }}
      @csrf
    <div class="input-group input-group-sm my-3">
      <div class="input-group-prepend col-4">
        <span class="input-group-text col-12" id="username">Username</span>
      </div>
      <input class="form-control font-weight-superlight col-8" name="username" value="{{ Auth::user()->username }}">
    </div>
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend col-4 ml-0">
        <span class="input-group-text col-12" id="password">Password</span>
      </div>
      <input class="form-control font-weight-superlight" name="password" value="New Password">
    </div>
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend col-4">
        <span class="input-group-text col-12" id="deleteUser">Delete <br />account</span>
      </div>
      <div class="form-control d-flex justify-content-between align-items-center col-8">
        <small>If you really want to, then you can</small>
        <a class="btn btn-danger btn-sm trans-size-80" href=<?php echo "/api/users/" . Auth::user()->id ?>
          onclick="event.preventDefault();document.getElementById('deleteaccount-form').submit();">
          Delete account
        </a>

      </div>
    </div>

    <a class="text-light btn btn-sm btn-info m-2" onclick="event.preventDefault(); document.getElementById('updateProfile').submit();">
        Update your information
    </a>
    </form>
    <form id="deleteaccount-form" action=<?php echo "/api/users/" . Auth::user()->id ?> method="POST" style="display: none;">
      {{ method_field('DELETE') }}
        @csrf
    </form>
  </div>

  <!-- PROFILE FORM ENDS HERE -->
  <!-- SPLIT -->
  <!-- ADD NEW GAMES FORM STARTS HERE -->
  <div class="col-12 col-md-6 text-center p-3">
    <h4 class="text-uppercase font-weight-superlight">Add Game</h4>
    <div class="">
      <form action="/api/games" method="POST">
        @csrf
        <div class="form-group input-group my-3 text-left">
          <div class="input-group-prepend">
            <span class="input-group-text" id="gameTitle">Game Title</span>
          </div>
          <input type="title" name="title" class="form-control form-control-sm" id="basic-url" aria-describedby="nameOfGame">
        </div>
        <div class="form-group input-group text-left">
          <div class="input-group-prepend">
            <span class="input-group-text">Game <br />Description</span>
          </div>
          <textarea type="text" name="description" class="form-control form-control-sm" aria-label="With textarea" id="gameDescription" rows="3"></textarea>
        </div>

        <div class="form-group input-group my-3 text-left">
          <div class="input-group-prepend">
            <span class="input-group-text" id="gamePrice">Game Price</span>
          </div>
          <input type="number" name="price" class="form-control form-control-sm" id="priceofgame" aria-describedby="priceOfGame">
        </div>
        <div class="form-group input-group my-3 text-left">
          <div class="input-group-prepend">
            <span class="input-group-text" id="gameImage">Game Image</span>
          </div>
          <input type="title" name="image" class="form-control form-control-sm" id="imageofgame" aria-describedby="imageOfGame">
        </div>




        <button type="submit" class="btn btn-sm btn-primary">Add game</button>
      </form>
    </div>
  </div>
</div>
<!-- ADD NEW GAMES FORM ENDS HERE -->
<!-- SPLIT -->
<!-- THE GAMES THAT IS ALREADY CREATED -->
<div class="row">
  <div class="py-3 col-12">
    <h4 class="text-uppercase text-center font-weight-superlight">
        My Created Games
    </h4>
    <ul class="list-group list-group-flush text-left">
      @foreach ($result as $game)
      <li class="list-group-item align-items-center">
        <div class="col-12 font-weight-light font-size-150">
          <a href={{ "/games/" . $game->id }}>{{ $game->name }} <span class="game"></span></a>
        </div>
        <p class="col-12 font-size-100 text-left overflow-scroll">
          {{ $game->description }}
        </p>
        <div class="col-12">
          @auth
            @if (Auth::user()->id === $game->ownerId)
            <button class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#editGameModal" data-gametitle="<?php echo $game->name ?>" data-gamedescription="<?php echo $game->description ?>" data-gameprice="<?php echo $game->price ?>" data-gameid="<?php echo $game->id ?>" >
              <i class="fal fa-pen"></i>
            </button>
            <a class="btn btn-danger btn-sm mb-2" href={{ "/api/games/" . $game->id }} onclick="event.preventDefault();document.getElementById('deletegame-form{{$game->id}}').submit();">
              <i class="fal fa-trash-alt"></i>
            </a>
            <form id="deletegame-form{{$game->id}}" action={{ "/api/games/" . $game->id }} method="POST" style="display: none;">
              {{ method_field('DELETE') }}
                @csrf
            </form>
            @endif
          @endauth
        </div>
      </li>
      @endforeach

    </ul>
  </div>
  <!-- THE GAMES THAT IS ALREADY CREATED -->
  <!-- SPLIT -->
  <!-- A MODAL (ALERT-LOOKING THING) FOR EDITING GAME DETAILS STARTS HERE -->
  <div class="modal fade" id="editGameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-superlight" id="exampleModalLabel">Edit <span class="printGameTitle">Name</span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="gameIdUpdate">
            {{ method_field('PUT') }}
            @csrf
            <div class="form-group">
              <label for="gameTitleUpdate" class="col-form-label">Game Title:</label>
              <input value="{gameTitle}" type="text" name="title" class="form-control" id="gameTitleUpdate">
            </div>
            <div class="form-group">
              <label for="gamePriceUpdate" class="col-form-label">Game Price:</label>
              <input value="{gamePrice}" type="number" name="price" class="form-control" id="gamePriceUpdate">
            </div>
            <div class="form-group">
              <label for="gameDescriptionUpdate" class="col-form-label">Game Description:</label>
              <textarea class="form-control" name="description" id="gameDescriptionUpdate">{gameDescription}</textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a class="btn btn-success btn-md" href=<?php echo "/api/games/" . $game->id ?>
            onclick="event.preventDefault();document.getElementById('gameIdUpdate').submit();">
            Save
          </a>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
