<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookItem;
use App\Models\BookTaken;
use DateTime;

class BookTakenController extends Controller
{
    /**
     * Save all added book taken items
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function saveBookHistoryItems(Request $request) {
        $bookId = intval($request->id);

        if ($request->historyItems && BookItem::find($bookId)) {
            foreach($request->historyItems as $historyItem){
                $newHistoryItem = new BookTaken;
                $newHistoryItem->book_item_id = $bookId;
                $newHistoryItem->taken_at = str_replace(' 24:',' 00:',$historyItem);
                $newHistoryItem->save();
            }
        }

        return redirect('editBook/' . $bookId);
    }

    /**
     * Delete book by id
     *
     * @param string $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deleteBookHistoryItem($id) {
        $bookItem = BookTaken::find($id);
        $bookId = $bookItem->book_item_id;
        $bookItem->delete();

        return redirect('editBook/' . $bookId);
    }
}
