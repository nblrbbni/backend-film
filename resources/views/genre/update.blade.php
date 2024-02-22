@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-header">Update Genre</div>
                    <div class="card-body">
                        <form action="/genre/{{ $genre->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_genre" class="form-label">Nama Genre</label>
                                <input type="text" id="nama_genre" name="nama_genre" class="form-control" value="{{$genre->nama_genre }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
