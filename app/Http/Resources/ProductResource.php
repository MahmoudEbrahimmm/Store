<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id'=> $this->id,
            'product_name'=> $this->name,
            'price'=> [
                'product_normal'=> $this->price,
                'product_compare'=> $this->compare_price,
            ],
            'product_description'=> $this->description,
            'product_image'=> $this->image_url,
            'relations'=> [
            'category'=> [
                'category_id'=> $this->category->id,
                'category_name'=> $this->category->name,
            ],
            'store'=> [
                'store_id'=> $this->store->id,
                'store_name'=> $this->store->name,
            ],
            ],
        ];
    }
}
