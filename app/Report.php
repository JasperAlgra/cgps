<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Report extends Eloquent
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['device_id', 'datetime', 'switch', 'eventId', 'lat', 'lon', 'IO', 'data', 'extra'];


    public function device()
    {
        return $this->belongsTo('App\Device');
//        return $this->belongsTo('App\Device', 'foreign_key', 'other_key');
    }

    public function voltages() {
        return $this->hasMany('App\Voltage');
    }

    public function data() {
        return $this->hasOne('App\Data');
    }
}
