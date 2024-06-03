<?php

namespace App\Scout;

use Illuminate\Database\Eloquent\Scope;

class BookWithRelationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model   $model
     * @return void
     */
    public function apply($builder, $model)
    {
        $builder->with(['authors', 'publisher']);
    }
}
