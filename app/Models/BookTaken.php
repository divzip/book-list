<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class BookTaken extends Model
{
    use HasFactory;

    /**
     * Assign relationship for taken items to belong to book itme
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book() {
        return $this->belongsTo(BookItem::class);
    }

    /**
     * Select by book id
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByBookId($query, $id)
    {
        return $query->where('book_item_id', '=', $id);
    }
}
