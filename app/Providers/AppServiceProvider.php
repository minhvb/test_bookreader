<?php

namespace App\Providers;

use App\Models\Book;
use App\Repositories\BookRepository;
use App\Scout\BookImportSourceFactory;
use App\Service\BookService;
use Illuminate\Support\ServiceProvider;
use Matchish\ScoutElasticSearch\Searchable\ImportSourceFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ImportSourceFactory::class, BookImportSourceFactory::class);
        $this->app->bind(
            BookService::class,
            function ($app) {
                return new BookService(
                    new BookRepository(new Book()),
                );
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
