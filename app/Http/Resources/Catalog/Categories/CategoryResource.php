<?php

namespace App\Http\Resources\Catalog\Categories;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'slug' => $this->whenHas('slug'),
            'parent_id' => $this->whenHas('parent_id'),
            'created_at' => $this->whenHas('created_at', fn() => $this->resource->created_at?->format('d.m.Y h:m:s')),
            'updated_at' => $this->whenHas('updated_at', fn() => $this->resource->updated_at?->format('d.m.Y h:m:s')),
            'children' => CategoryResource::collection($this->whenLoaded('children')),
            'parent' => new CategoryResource($this->whenLoaded('parent'))
        ];
    }
}
