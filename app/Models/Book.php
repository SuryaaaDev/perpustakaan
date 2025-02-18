<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'year',
        'image',
    ];

    public function types() :BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'books_types');
    }

    public function user() :BelongsToMany
    {
        return $this->belongsToMany(User::class, 'borrowings');
    }
}
