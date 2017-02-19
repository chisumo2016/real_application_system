<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // The attributes that are mass assignable

    protected $fillable = [
        'title', 'content', 'featured', 'category_id',
    ];

   public  function  Categories()
   {
       return $this->belongsTo('App\Category');
   }
}
