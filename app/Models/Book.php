<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

    protected $fillable = [
        'isbn',
        'title',
        'description',
        'author',
        'category_id',
        'publish_year',
        'cover',
    ];

    protected $primaryKey = 'isbn';

    protected $keyType = 'string';

    public $incrementing = false;
}
