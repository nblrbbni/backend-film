@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-header">Tambah Genre Baru</div>
                    <div class="card-body">
                        <form action="/genre" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_genre" class="form-label">Nama Genre</label>
                                <input type="text" id="nama_genre" name="nama_genre" class="form-control">
                                @error('nama_genre')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Tabel Genre</div>
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Genre</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($genre as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->nama_genre }}</td>
                                        <td>
                                            <form action="/genre/{{ $value->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="/genre/{{ $value->id }}/edit" class="btn btn-warning">Edit</a>
                                                <a href="/genre/{{ $value->id }}/delete" class="btn btn-danger"
                                                    onclick="confirmation(event)" onclick="confirmation(event)">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak Ada Data.</td>
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
