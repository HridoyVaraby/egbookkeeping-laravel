<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title', 'slug', 'body', 'excerpt', 'featured_image',
        'is_published', 'meta_title', 'meta_description', 'meta_keywords', 'category_id', 'author_id'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the category that owns the post.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author that wrote the post.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    protected static function booted()
    {
        static::saved(function ($model) {
            \Spatie\ResponseCache\Facades\ResponseCache::clear();
            \Illuminate\Support\Facades\Artisan::call('sitemap:generate');
        });

        static::deleted(function ($model) {
            \Spatie\ResponseCache\Facades\ResponseCache::clear();
            \Illuminate\Support\Facades\Artisan::call('sitemap:generate');
        });
    }
}
