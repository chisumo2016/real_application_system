<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //Mass Assigment
    protected $fillable = ['site_name', 'contact_name','contact_email','address'];
}
