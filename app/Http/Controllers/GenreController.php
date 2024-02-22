<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GenreController extends Controller
{
    public function index()
    {
        $genre = DB::table('genre')->get();

        return view('genre.index', ['genre' => $genre]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_genre' => 'required|unique:kategori',
        ]);

        DB::table('genre')->insert([
            'nama_genre' => $request['nama_genre'],
        ]);

        Alert::success('Success!', 'Genre added successfully');
        return redirect('/genre');
    }

    public function edit($id)
    {
        $genre = DB::table('genre')->where('id', $id)->first();

        return view('genre.update', ['genre' => $genre]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_genre' => 'required',
        ]);

        DB::table('genre')
            ->where('id', $id)
            ->update(
                [
                    'nama_genre' => $request->nama_genre,
                ],
            );

        Alert::success('Success!', 'Genre updated successfully');
        return redirect('/genre');
    }

    public function delete($id)
    {
        DB::table('genre')->where('id', $id)->delete();

        return redirect('/genre');
    }
}
