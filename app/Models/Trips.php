<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Trips extends Model
{
    use Sluggable;

    protected $table = 'trips';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function programs()
    {
        return $this->hasMany('App\Models\Programs', 'trip_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany('App\Models\Galleries', 'trip_id', 'id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getImageCover()
    {
        return config('app_url') . $this->image_cover;
    }

    public function getImage()
    {
        return config('app_url') . $this->thumbnail;
    }

    public function getUrl()
    {
        return url('/course/' . $this->slug);
    }
}
