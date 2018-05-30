<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.layout')

@section('title', 'Details')

@section('content')

<div class="row p-3">
  <?php foreach ($result as &$game): ?>
  <div class="col-5">
    <img class="img-fluid" src=<?php echo $game->image; ?> alt="Game image">
  </div>
  <div class="col-5">
    <p class="display-4"><?php echo $game->name; ?></p>
    <p><?php echo $game->description; ?></p>
    @auth
      @if (Auth::user()->id === $game->ownerId)
      <a href="/games" class="btn btn-primary">Redigera Spel</a>
      <a class="btn btn-danger" href=<?php echo "/api/games/" . $game->id ?>
         onclick="event.preventDefault();
                       document.getElementById('deletegame-form').submit();">
          {{ __('Delete game') }}
      </a>

      <form id="deletegame-form" action=<?php echo "/api/games/" . $game->id ?> method="POST" style="display: none;">
        {{ method_field('DELETE') }}
          @csrf
      </form>
      @endif
    @endauth

    </div>
    <div class="text-muted text-center col-12 p-3">
      Added at: <?php echo $game->createdAt; ?>
      <hr/>
    </div>
  </div>
  <ul class="list-group list-group-flush col-6 offset-3">
    <h4 class="p-3 mt-2 text-center">Reviews</h4>

    @auth
    <p class="text-center">Add your own review of this game!</p>
    <form action=<?php echo "/api/reviews/" . $game->id ?> method="POST" id="addReviewForm">
        @csrf
  <div class="form-group">
    <label for="rating">Rating</label>
    <select id="rating" name="rating" class="form-control form-control-lg col-sm-1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="reviewComment">Comment</label>
        <textarea rows="6" id="reviewComment" type="text" class="form-control" name="comment" required></textarea>
  </div>
  <a class="btn btn-primary" href=<?php echo "/api/reviews/" . $game->id ?>
     onclick="event.preventDefault();
                   document.getElementById('addReviewForm').submit();">
      {{ __('Submit Review') }}
  </a>
</form>
@endauth

    @foreach ($game->reviews as $review)
    <li class="list-group-item d-flex justify-content-between align-items-center pt-3 pb-0">
      <div>
        <p>{{$review->review}}</p>
        <p>{{$review->createdAt}}</p>
        <p>{{$review->username}}</p>
      </div>
      <div class="bg-dark p-2 text-light rounded">
        Rating <span class="badge badge-light">{{$review->reviewId}}</span>
      </div>
      @auth
        @if (Auth::user()->id === $review->userId)
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editReviewModal" data-reviewcomment="<?php echo $review->review ?>" data-reviewrating="<?php echo $review->rating ?>" data-reviewid="<?php echo $review->reviewId?>">
          <i class="fal fa-pen"></i>
        </button>
        @endif
      @endauth
    </li>
    @endforeach
  </ul>
  <?php endforeach; ?>
  <!-- A MODAL (ALERT-LOOKING THING) FOR EDITING Reviews DETAILS STARTS HERE -->
  <!-- A MODAL (ALERT-LOOKING THING) FOR EDITING Reviews DETAILS STARTS HERE -->
  <!-- A MODAL (ALERT-LOOKING THING) FOR EDITING Reviews DETAILS STARTS HERE -->
  <!-- A MODAL (ALERT-LOOKING THING) FOR EDITING Reviews DETAILS STARTS HERE -->
  <div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-superlight" id="exampleModalLabel">Edit review for <span class="printGameTitle">Name</span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="gameIdUpdate">
            {{ method_field('PUT') }}
            @csrf
            <div class="form-group">
              <label for="gameTitleUpdate" class="col-form-label">Review Comment:</label>
              <input value="Something went wrong" type="text" name="title" class="form-control" id="reviewCommentUpdate">
            </div>
            <div class="form-group">
              <label for="gamePriceUpdate" class="col-form-label">Review Rating:</label>
              <input value="Something went wrong" type="number" name="price" class="form-control" id="reviewratingUpdate">
            </div>
            <div class="form-group">
              <label for="gameDescriptionUpdate" class="col-form-label">Review Id:</label>
              <input value="Something went wrong" class="form-control text-center" name="description" id="reviewIdUpdate" disabled>
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
