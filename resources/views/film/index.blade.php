@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-header">Tambah Film Baru</div>
                    <div class="card-body">
                        <form action="/film" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Nama Film</label>
                                <input type="text" id="title" name="title" class="form-control">
                                @error('title')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="genre_id" class="form-label">Genre Film</label>
                                <select class="form-select" name="genre_id" id="genreSelect">
                                    @foreach ($genre as $value)
                                        <option value="{{ $value->id }}">{{ $value->nama_genre }}</option>
                                    @endforeach
                                </select>
                                @error('genre_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Tabel Film</div>
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Film</th>
                                    <th>Genre Film</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($film as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->genre_id }}</td>
                                        <td>
                                            <form action="/film/{{ $value->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="/film/{{ $value->id }}/edit" class="btn btn-warning">Edit</a>
                                                <a href="/film/{{ $value->id }}/delete" class="btn btn-danger"
                                                    onclick="confirmation(event)">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Tidak Ada Data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
