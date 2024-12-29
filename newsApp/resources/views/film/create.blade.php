@extends('layouts.master')

@section('title')
    halaman create film
@endsection

@section('content')
    <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea name="summary" id="summary" class="form-control" rows="4" required>{{ old('summary') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="release_year" class="form-label">Release Year</label>
            <input type="text" name="release_year" id="release_year" class="form-control"
                value="{{ old('release_year') }}" required>
        </div>

        <div class="mb-3">
            <label for="poster" class="form-label">Poster</label>
            <input type="file" name="poster" id="poster" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select name="genre_id" id="genre_id" class="form-control" >
                <option value="" disabled selected>Select Genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
