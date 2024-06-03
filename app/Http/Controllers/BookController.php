<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchBookRequest;
use App\Service\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function __construct(private readonly BookService $bookService)
    {
    }

    public function searchBook(SearchBookRequest $request): AnonymousResourceCollection
    {
        return $this->bookService->searchBook($request);
    }
}
