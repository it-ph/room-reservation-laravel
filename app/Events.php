<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $dates = ['start','end'];
    protected $guarded = [];
    const CREATED_AT = 'createdAt'; //disableOnLocal
    const UPDATED_AT = 'updatedAt'; //disableOnLocal

    public function theRoom()
    {
        return $this->belongsTo('App\Rooms','roomId');
    }

    public function theCreator()
    {
        return $this->belongsTo('App\User','createdBy');
    }

}
