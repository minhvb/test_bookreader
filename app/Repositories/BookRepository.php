<?php

namespace App\Repositories;

use App\Models\Book;
use App\Resource\BookResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Prettus\Repository\Eloquent\Repository;

class BookRepository extends Repository
{
    protected $fieldSearchable = [
        'title',
        'summary',
        'authors.name'
    ];

    public function model(): string
    {
        return Book::class;
    }

    public function searchBook(string $query, int $limit = 10): AnonymousResourceCollection
    {
        return BookResource::collection(
            Book
                ::search(
                    "
                        title:*$query* OR
                        summary:*$query* OR
                        authors.name:*$query* OR
                        publisher.name:*$query*
                    "
                )
                ->paginate($limit)
        );
    }
}
