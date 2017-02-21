<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    // The attributes that are mass assignable

    protected $fillable = [
        'title', 'content', 'featured', 'category_id','slug'
    ];

    protected $dates = ['deleted_at'];

   public  function  Categories()
   {
       return $this->belongsTo('App\Category');
   }

   public function tags()
   {
       return $this->belongsToMany('App\Tag');
   }

   //Accessors for image

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);   // Will generate a link for accesors
    }

}
