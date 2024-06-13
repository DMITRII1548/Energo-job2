<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParentProfession extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name'
    ];

    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class); 
    }
}
