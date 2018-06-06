<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rsvp extends Model
{
    protected $fillable = ['event_id','user_id','status'];
}
