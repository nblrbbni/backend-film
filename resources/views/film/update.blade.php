@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-header">Update Film</div>
                    <div class="card-body">
                        <form action="/film/{{ $film->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Nama Film</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ $film->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="genre_id" class="form-label">Genre Film</label>
                                <select class="form-select" name="genre_id" id="genreSelect">
                                    @foreach ($genre as $value)
                                        @if ($value->id === $film->genre_id)
                                            <option value="{{ $value->id }}" selected>{{ $value->nama_genre }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->nama_genre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
