<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profession extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'profession_profile');
    }

    public function parentProfession(): BelongsToMany   
    {
        return $this->belongsToMany(Profession::class,'');
    }
}
