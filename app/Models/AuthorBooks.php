<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AuthorBooks extends Pivot
{
    protected $table = 'author_has_books';

    public $timestamps = false;





}
