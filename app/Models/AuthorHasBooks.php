<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AuthorHasBooks extends Pivot
{
    use HasFactory;

    protected $table = 'author_has_books';

    public $timestamps = false;

    public function books() {
        return $this->belongsTo(Books::class);
    }

    public function authors() {
        return $this->belongsTo(Authors::class);
    }





}
