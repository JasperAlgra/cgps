<?php

namespace App;

use Eloquent;

class Voltage extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['report_id', 'input', 'value'];


    public function report() {

        return $this->hasOne('App\Report');
    }
}
