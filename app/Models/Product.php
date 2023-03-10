<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class Product extends Model implements HasMedia, Buyable
{
    use HasFactory, HasSlug, HasTags, InteractsWithMedia;

    protected $with = ['brand', 'category', 'media'];

    protected $fillable = [
        'name',
        'sku',
        'description',
        'category_id',
        'price',
        'old_price',
        'quantity',
        'brand_id',
    ];

    protected $appends = [
//        'avg_rating',
//        'ratings',
//        'rating_count',
    ];
    public const MEDIA_COLLECTION = 'product';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['name'])
            ->saveSlugsTo('slug');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the identifier of the Buyable item.
     *
     * @return int|string
     */
    public function getBuyableIdentifier($options = null)
    {
        return $this->slug;
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @return string
     */
    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }

    /**
     * Get the price of the Buyable item.
     *
     * @return float
     */
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

    /**
     * Get the weight of the Buyable item.
     *
     * @return float
     */
    public function getBuyableWeight($options = null)
    {
        return 0;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    public function getRatingsAttribute()
    {
        return $this->reviews()->selectRaw('rating, count(*) as rating_count')->groupBy('rating')->get()->pluck('rating_count', 'rating')->toArray();
    }
    public function getAvgRatingAttribute()
    {
        //return avg rating upto 1 decimal place
        return round($this->reviews->avg('rating'), 1);

    }

    public function getRatingCountAttribute()
    {
        return $this->reviews->count();
    }

    public function latestReviews()
    {
        return $this->reviews()->whereNotNull('body')->latest()->take(3);
    }
}
