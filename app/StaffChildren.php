<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffChildren extends Model
{
    protected $table = 'staff_children';
    protected $primaryKey = 'sid';
    protected $fillable = ['sid','name','position','age','created_at','updated_at'];
    protected $dates = ['created_at','updated_at'];
}
