<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'beds', 'baths', 'area', 'city', 'code', 'street', 'street_nr', 'price'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class, 'by_user_id'
        );
    }
}
