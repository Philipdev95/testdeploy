<!-- Stored in resources/views/user.blade.php -->

@extends('layouts.layout')

@section('title', 'Page Title')

@section('content')
<div class="row">
  <div class="card col-6 text-center my-3 mx-auto">
    <div class="card-body">
      <h5 class="card-title">username</h5>
      <ul class="list-group list-group-flush text-left">
        <li class="list-group-item">Your id: {{ $id }}</li>
        <li class="list-group-item">Your id: {{ $id }}</li>
        <li class="list-group-item">Your id: {{ $id }}</li>
      </ul>
      <a href="#" class="btn btn-danger m-2">Logout</a>
    </div>
  </div>
</div>
@endsection
