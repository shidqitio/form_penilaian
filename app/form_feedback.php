<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class form_feedback extends Model
{
    public $timestamps = false ;
    protected $table = 'form_feedback';
    protected $primaryKey = 'no';
}
