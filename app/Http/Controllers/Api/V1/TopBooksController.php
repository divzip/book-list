<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\BookItem;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TopBooksResource;
use App\Http\Resources\V1\TopBooksCollection;

class TopBooksController extends Controller
{
    /**
     * Show top popularity books for this month
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return new TopBooksCollection(BookItem::selectUpdatedList('', 10, true));
    }

    /**
     * Block individual item calls
     *
     * @return never
     */
    public function show() {
        return abort(404);
    }
}
