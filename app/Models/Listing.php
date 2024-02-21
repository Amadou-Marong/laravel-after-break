<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ListingImage;
use App\Models\Offer;

class Listing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'beds', 'baths', 'area', 'city', 'code', 'street', 'street_nr', 'price', 'listing_image'
    ];
    protected $appends = ['src'];

    public function getSrcAttribute(): string
    {
        return asset("storage/{$this->listing_image}");
    }
    
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class, 'by_user_id'
        );
    }

    public function images():HasMany
    {
        return $this->hasMany(ListingImage::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class, 'listing_id');
    }

    // local query scopes

    public function scopeMostRecent(Builder $query): Builder
    {
        return $query->orderByDesc('created_at');
    }

    public function scopeWithoutSold(Builder $query): Builder
    {
        // return $query->doesntHave('offers')
        //     ->orWhereHas('offers', 
        //     fn(Builder $query) => $query->whereNull('accepted_at')
        //     ->whereNull('rejected_at')
        // );

        return $query->whereNull('sold_at');
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters['minPrice'] ?? false,
            fn($query, $value) => $query->where('price', '>=', $value)
        )->when(
            $filters['maxprice'] ?? false,
            fn($query, $value) => $query->where('price', '<=', $value)
        )->when(
            $filters['beds'] ?? false,
            fn($query, $value) => $query->where('beds', (int)$value < 6 ? $value : '>=', 6)
        )->when(
            $filters['baths'] ?? false,
            fn($query, $value) => $query->where('baths', (int)$value < 6 ? $value : '>=', 6)
        )->when(
            $filters['minArea'] ?? false,
            fn($query, $value) => $query->where('area', '>=', $value)
        )->when(
            $filters['maxArea'] ?? false,
            fn($query, $value) => $query->where('area', '<=', $value)
        )->when(
            $filters['deleted'] ?? false,
            fn($query, $value) => $query->withTrashed()
        );
    }
}
