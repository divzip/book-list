<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookItem;
use App\Models\BookTaken;

class BookItemController extends Controller
{
    /**
     * Create new book item
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function saveBookItem(Request $request) {
        $newBookItem = new BookItem;
        $newBookItem->name = $request->bookName;
        $newBookItem->author = $request->bookAuthor;
        $newBookItem->status = 0;
        $newBookItem->save();

        return redirect('/');
    }

    /**
     * Delete book by id
     *
     * @param string $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deleteBookItem($id) {
        $bookItem = BookItem::find($id);
        $bookItem->delete();

        return redirect('/');
    }

    /**
     * Edit book form page.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function editBookItem(Request $request)
    {
        $id = intval($request->id);
        $book = BookItem::find($id);
        $historyItems = BookTaken::byBookId($id)->paginate(10);
        $type = 'edit';

        if ($request->isMethod('post')) {
            $book->name = $request->bookName ?: $book->name;
            $book->author = $request->bookAuthor ?: $book->author;
            $book->status = $request->bookStatus ?: 0;
            $book->save();

            return redirect('editBook/' . $id);
        }

        if ($request->isMethod('get')) {
            return view('edit-book', [
                'book' => $book,
                'historyItems' => $historyItems,
                'type' => $type,
                'id' => $id
            ]);
        }
    }
}
