<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote',
        'page_number',
        'favorite',
        'user_id',
        'book_id',
    ];

    /**
     * A Quote Belongs To a User
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A Quote Belongs To a Book
     *
     * @return BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
