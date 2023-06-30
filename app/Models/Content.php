<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['content_text', 'faq', 'slug_id'];

    protected $casts = [
        "faq"    => Json::class,
    ];
}
