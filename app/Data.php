<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Data extends Eloquent
{

    protected $fillable = ['report_id', 'data'];

    public function report()
    {
        return $this->belongsTo('App\Report');
    }
}
