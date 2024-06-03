<?php

namespace App\Scout;

use Matchish\ScoutElasticSearch\Searchable\DefaultImportSource;
use Matchish\ScoutElasticSearch\Searchable\ImportSource;
use Matchish\ScoutElasticSearch\Searchable\ImportSourceFactory;

final class BookImportSourceFactory implements ImportSourceFactory
{
    public static function from(string $className): ImportSource
    {
        return new DefaultImportSource($className, [new BookWithRelationScope()]);
    }
}
