<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplexComment extends Model
{
    protected $table = 'aper_complex_comments';
    protected $primaryKey ='aper_id';

    protected $fillable = [
        'aper_id','sid','chairman_id','comment'
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
