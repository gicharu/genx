<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';
    public string $book_author;

    public function authors() {
        return $this->belongsToMany(Authors::class, 'author_has_books', 'book_id', 'author_id');
    }

}
