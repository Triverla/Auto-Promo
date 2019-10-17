<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HodComment extends Model
{
    protected $table = 'hod_comments';
    protected $primaryKey ='aper_id';

    protected $fillable = [
        'aper_id','sid','hid','comment'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function staff(){
        return $this->belongsTo('App\Staff', 'sid');
    }

    public function hod(){
        return $this->belongsTo('App\Hod', 'hid');
    }

    public function aper(){
        return $this->belongsTo('App\AperForm', 'aper_id');
    }
}
