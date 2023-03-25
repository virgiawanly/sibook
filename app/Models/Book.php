<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'isbn',
        'image',
        'description',
        'language',
        'pages',
        'year',
        'edition',
        'size',
        'weight',
        'price',
        'stock',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
        'deleted_at' => 'datetime:d/m/Y H:i',
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . config('files.book_image_dir') . '/' . $this->image) : asset('assets/images/no-product-image.svg');
    }
}
