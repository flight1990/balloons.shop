<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request): array
    {
        return [
            'name' => $this->whenHas('name'),
            'slug' => $this->whenHas('slug'),
            'children' => CategoryResource::collection($this->whenLoaded('children'))
        ];
    }
}
