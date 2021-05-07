<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id',
        'title',
        'author',
        'publishedDate',
        'description',
        'pageCount',
        'thumbnail',
    ];

    /**
     * A Book Belongs To Many Users
     *
     * @return BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A Book Has Many Quotes
     *
     * @return HasMany
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
