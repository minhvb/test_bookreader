<?php

namespace App\Service;

use App\Http\Requests\SearchBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Repositories\BookRepository;
use App\Resource\BookResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookService
{
    public function __construct(private readonly BookRepository $bookRepository)
    {
    }

    public function searchBook(SearchBookRequest $request): AnonymousResourceCollection
    {
        $query = $request->get('q');
        $limit = $request->get('limit', 10);

        return $this->bookRepository->searchBook($query, $limit);
    }
}
