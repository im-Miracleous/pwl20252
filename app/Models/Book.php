<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Implementasi jika tabel Author direalisasikan
//    public function author()
//    {
//        return $this->belongsTo(Author::class);
//    }
}
