<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Association extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'roles',
        'email',
        'password',
        'logo',
        'video',
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
        'others',
        'form',
        'projects',
        'thumbnail',
        'validated',
    ];

    /**
     * Auto-set values
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            // Generate slug
            $slug = Str::slug($query->name);
            // Count if another association has the same name
            $count = static::where('slug', $slug)->count();
            // if count > 0 add count after slug else juste save the slug
            $query->slug = $count ? $slug . '-' . $count : $slug;
        });
    }

    /**
     * Get the route key for the model.
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //======================================================================
    // RELATIONS
    //======================================================================

    /**
     * Get category of the association
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all files related to the association
     */
    public function files()
    {
        return $this->hasMany(File::class);
    }

    //======================================================================
    // RELATIONS FUNCTIONS
    //======================================================================

    /**
     * Get all the images related to the association inside all files
     */
    public function images()
    {
        return $this->files()->where('type', 'image')->get();
    }

    /**
     * Get all the video related to the association inside all files
     */
    public function video()
    {
        return $this->files()->where('type', 'video')->first();
    }
}
