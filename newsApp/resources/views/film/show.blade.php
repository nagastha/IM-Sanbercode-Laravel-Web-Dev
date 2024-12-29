@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Film Details</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{ $film->title }}</h2>
            <p class="card-text"><strong>Summary:</strong> {{ $film->summary }}</p>
            <p class="card-text"><strong>Release Year:</strong> {{ $film->release_year }}</p>
            <p class="card-text"><strong>Genre:</strong> {{ $film->genre_id }}</p> <!-- Change to genre name if you have a relationship -->
            @if ($film->poster)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}" width="200">
                </div>
            @else
                <p class="text-muted">No Poster</p>
            @endif
            <a href="{{ route('films.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
