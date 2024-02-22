<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FIlm extends Model
{
    use HasFactory;
    protected $table = 'film';
    protected $fillable = ['title', 'genre_id'];

    public function Genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
