<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
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

    public static function hasNecessaryAttributes($gBook) {

        $mustHave = [
            ['id'],
            ['volumeInfo','title'],
            ['volumeInfo','authors'],
            ['volumeInfo','publishedDate'],
            ['volumeInfo','description'],
            ['volumeInfo','pageCount'],
            ['volumeInfo','imageLinks','thumbnail']
        ];

        foreach($mustHave as $attribute) {
            $result = array_reduce($attribute, function($a, $b) {
                if(isset($a[$b])) {
                    return $a[$b];
                } else {
                    return false;
                }
            }, $gBook);
            if (!$result) return false;
        }
        return true;
    }
}
