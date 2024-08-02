<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image'
    ];

    public function getImageSrcAttribute(): string
    {
        return url('/storage/' . $this->image);
    }
}
