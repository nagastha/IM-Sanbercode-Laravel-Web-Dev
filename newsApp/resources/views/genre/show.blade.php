@extends('layouts.master')

@section('content')
<div class="container">
    <h1>genre Details</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-name">{{ $genre->name }}</h2>
            <a href="{{ route('genres.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
