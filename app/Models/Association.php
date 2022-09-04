<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Association extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'roles',
        'email',
        'password',
        'logo',
        'status',
        'catchphrase',
        'description',
        'profile_type',
        'category_id',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'twitch',
        'discord',
        'tiktok',
        'linkedin',
        'autre',
        'form',
        'thumbnail',
        'validated',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->slug = Str::uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
