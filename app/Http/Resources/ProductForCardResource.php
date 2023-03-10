<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductForCardResource extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'sku' => $this->sku,
            'description' => $this->description,
            'category_name' => $this->category->name,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'brand_name' => $this->brand->name,
            'first_media' => $this->getFirstMediaUrl(Product::MEDIA_COLLECTION),
            'first_media_name' => $this->getFirstMedia(Product::MEDIA_COLLECTION)?->name,
            'rating' => $this->avg_rating,
            'rating_count' => $this->rating_count,
            'avg_rating' => $this->avg_rating,
        ];
    }
}
