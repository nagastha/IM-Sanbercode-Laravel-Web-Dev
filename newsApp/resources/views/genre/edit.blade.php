@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit genre</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('genres.update', $genre->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $genre->name) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
