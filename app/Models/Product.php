<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'title',
    'category',
    'price',
    'description',
    'image',
    'sample_link',

    // DETAIL BUKU
    'pages',
    'curriculum',
    'grade',
    'class',
    'group',
    'isbn',
    'published_at'
];


}
