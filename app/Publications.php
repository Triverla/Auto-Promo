<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    protected $table = 'staff_publications';
    protected $primaryKey ='sid';
    protected $fillable = ['sid','details','url','type','date'];
    protected $dates = ['date','created_at','updated_at'];
}
