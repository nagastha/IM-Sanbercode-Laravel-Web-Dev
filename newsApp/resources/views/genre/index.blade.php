@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">genres List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Add New genre</a>

    @if ($genres->isEmpty())
        <div class="alert alert-info">
            No genres found. Start by adding one!
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $genre->name }}</td>
                         <!-- Change to genre name if you have a relationship -->

                        <td>
                            <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this genre?');">
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
