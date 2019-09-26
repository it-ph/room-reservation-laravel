<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $dates = ['start','end'];
    protected $guarded = [];

    public function theRoom()
    {
        return $this->belongsTo('App\Rooms','roomId');
    }

    public function theCreator()
    {
        return $this->belongsTo('App\User','createdBy');
    }

}
