@extends('layouts.master')

@section('title')
    halaman create cast
@endsection

@section('content')
<form action="/cast" method="POST">
  @csrf
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
      <label>Umur</label>
      <input type="text" name="age" class="form-control">
    </div>
    <div class="mb-3">
      <label>Bio</label>
      <input type="text" name="bio" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection