<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'expirience',
        'portfolio',
        'avatar',
        'is_published'
    ];

    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return url('/storage/' . $this->avatar);
        }

        return '';
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'profile_skill');
    }

    public function professions(): BelongsToMany
    {
        return $this->belongsToMany(Profession::class, 'profession_profile');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
