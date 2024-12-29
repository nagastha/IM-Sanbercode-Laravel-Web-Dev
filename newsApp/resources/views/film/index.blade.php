@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Films List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('films.create') }}" class="btn btn-primary mb-3">Add New Film</a>

    @if ($films->isEmpty())
        <div class="alert alert-info">
            No films found. Start by adding one!
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Summary</th>
                    <th>Release Year</th>
                    <th>Genre</th>
                    <th>Poster</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $film->title }}</td>
                        <td>{{ Str::limit($film->summary, 50) }}</td>
                        <td>{{ $film->release_year }}</td>
                        <td>{{ $film->genre_id }}</td> <!-- Change to genre name if you have a relationship -->
                        <td>
                            @if ($film->poster)
                                <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}" width="50">
                            @else
                                <span class="text-muted">No Poster</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('films.show', $film->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('films.edit', $film->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('films.destroy', $film->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this film?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
