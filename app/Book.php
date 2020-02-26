<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'author',
        'pages',
        'genre',
        'publisher',
        'description',
        'creator_id',
        'sort_order',
    ];
}
