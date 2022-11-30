<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookItem;

class DefaultController extends Controller
{
    /**
     * Show the book list.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function bookList(Request $request)
    {
        $search = $request->query('search') ?: '';
        $listItems = BookItem::selectUpdatedList($search);

        return view('book-list', ['listItems' => $listItems, 'search' => $search]);
    }

    /**
     * Show add book form page.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function addBook()
    {
        $type = 'add';
        return view('add-book', ['type' => $type]);
    }
}