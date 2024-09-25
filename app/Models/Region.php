<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property string $name
 * @property int|null $id
 * @property string $slug
 * @property string $href
 * @property mixed $news
 * @property mixed $abouts
 * @method static simplePaginate(?int $int = null)
 */
class Region extends Model
{
    use HasFactory;

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function abouts(): HasMany
    {
        return $this->hasMany(About::class);
    }

    public function getHrefAttribute(): string {
        return '/'.$this->slug;
    }

    public function getIsActiveAttribute(): string {
        return $this->slug === app('region_manager')->getRegionSlug();
    }
}
