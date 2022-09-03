<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
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

    public function associations()
    {
        return $this->hasMany(Association::class);
    }
}
