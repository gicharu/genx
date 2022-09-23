<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = ['id', 'first_name', 'surname'];


    public function books() {
        return $this->belongsToMany(Books::class, 'author_has_books', 'author_id', 'book_id');
    }
}
