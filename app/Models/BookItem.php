<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookItem extends Model
{
    use HasFactory;

    /**
     * Assign relationship for book with many taken items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function takens() {
        return $this->hasMany(BookTaken::class);
    }

    /**
     * Select list with takens items and count this months popularity
     *
     * @param string $search
     * @param integer $pageLimit
     * @param boolean $api
     * @return mixed
     */
    public function selectUpdatedList($search = '', $pageLimit = 10, $api = false) {
        $currentMonth = date('m');
        $currentYear = date('Y');

        $updatedList = self::selectRaw(
            'book_items.*,
            COUNT(book_takens.id) 
            AS totalPopularity, 
            COUNT(CASE WHEN 
            YEAR(book_takens.taken_at) = ' . $currentYear .
            ' AND 
            MONTH(book_takens.taken_at) = ' . $currentMonth .
            ' THEN 1 END) 
            AS monthlyPopularity'
        )
            ->leftJoin('book_takens', 'book_items.id', '=', 'book_takens.book_item_id')
            ->when($search != '', function ($q) use ($search) {
                return $q->where('book_items.name', 'LIKE', '%' . $search . '%')
                    ->orWhere('book_items.author', 'LIKE', '%' . $search . '%');
            })
            ->groupBy(['book_items.id'])
            ->orderByDesc('monthlyPopularity');

        if ($api) {
            return $updatedList->take($pageLimit)->get();
        } else {
            return $updatedList->paginate($pageLimit);
        }
    }
}
