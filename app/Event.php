<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;
class Event extends Model
{
    protected $fillable = ['type','name','date_time','host','place','photo'];
  

   
     

}
