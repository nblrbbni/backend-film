<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FilmController extends Controller
{
    public function index()
    {
        $film = DB::table('film')->get();
        $genre = DB::table('genre')->get();

        return view('film.index', [
            'film' => $film,
            'genre' => $genre
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required',

        ]);

        DB::table('film')->insert([
            'title' => $request['title'],
            'genre_id' => $request['genre_id'],

        ]);

        Alert::success('Success!', 'Film added successfully');
        return redirect('/film');
    }

    public function edit($id)
    {
        $film = DB::table('film')->where('id', $id)->first();
        $genre = DB::table('genre')->get();

        return view('film.update', [
            'film' => $film,
            'genre' => $genre
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required',
        ]);

        DB::table('film')
            ->where('id', $id)
            ->update(
                [
                    'title' => $request->title,
                    'genre_id' => $request->genre_id,
                ],
            );

        Alert::success('Success!', 'Film updated successfully');
        return redirect('/film');
    }

    public function delete($id)
    {
        DB::table('film')->where('id', $id)->delete();

        return redirect('/film');
    }
}
