<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $uploads = 'public/product/';

    
    protected $fillable = [
        'name','image','quantity','rate','status'
    ];

    public function brands()
    {
        return $this->belongsToMany('App\Brand')->withTimestamps();
    }

	public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    // public function getImageAttribute($photo)
    // {
    //     return $this->uploads.$photo;
    // } 
       
}
