<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDelete;
    // The attributes that are mass assignable

    protected $fillable = [
        'title', 'content', 'featured', 'category_id',
    ];

    protected $dates = ['deleted_at'];

   public  function  Categories()
   {
       return $this->belongsTo('App\Category');
   }
}
