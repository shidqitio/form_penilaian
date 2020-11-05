<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class masa extends Model
{
    public $timestamps = false ;
    protected $table = 'masa';
    protected $primaryKey = 'kd_masa';
}
