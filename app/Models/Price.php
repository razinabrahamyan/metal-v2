<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        "by_wholesale",
        "price_above_from_to",
        "price_below",
        "price_from_to",
        "weight"
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
