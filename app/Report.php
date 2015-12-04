<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
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
    protected $fillable = ['IMEI', 'datetime', 'switch', 'eventId','lat','lon','IO', 'data', 'extra'];

}
