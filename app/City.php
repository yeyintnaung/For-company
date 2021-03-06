<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected  $table = "cities";
  
  protected $fillable = ['name','country_id'];

  protected $dateFormat = 'Y-m-d H:i:s';
}
