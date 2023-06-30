<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MarqueePrice extends Model
{
    use HasFactory;

    protected $fillable = ["title", "price", "direction"];

    public function slug(): HasOne
    {
        return $this->hasOne(Slug::class,'id','slug_id');
    }
}
