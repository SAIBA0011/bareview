<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $fillable = [
    	'release_date',
    	'name',
    	'description',
    	'cover_img',
    	'featured_img',
    	'online',
    	'pdf',
    	'featured'
    ];

    protected $dates = [
    	'release_date'
    ];

    public function scopefeatured()
    {
    	return $this->where('featured', true)->first();
    }
}
