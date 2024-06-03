<?php

namespace App\Resource;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class BookResource extends JsonResource
{
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        $parent = parent::toArray($request);

        return array_merge(
            $parent,
            [
                'authors' => $this->authors->pluck('name'),
                'publisher' => $this->publisher->name
            ]
        );
    }
}
