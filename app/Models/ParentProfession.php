<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParentProfession extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'title'
    ];

    public function professions(): HasMany
    {
        return $this->hasMany(Profession::class); 
    }
}
