<?php
use Laravel\Scout\ScoutServiceProvider;
use Matchish\ScoutElasticSearch\ElasticSearchServiceProvider;
use Prettus\Repository\RepositoryServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    ScoutServiceProvider::class,
    RepositoryServiceProvider::class,
    ElasticSearchServiceProvider::class
];
