<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HodApprovedApplications extends Model
{
    protected $table = 'hodapproved';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function aper()
    {
        return $this->belongsTo(AperForm::class, 'application_no');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'sid');
    }
}
