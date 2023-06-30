<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = ['h1', 'title', 'keywords', 'description', 'slug_id'];

    public function slug()
    {
        return $this->belongsTo(Slug::class);
    }
}
