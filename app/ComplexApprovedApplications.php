<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplexApprovedApplications extends Model
{
    protected $table = 'complex_approved';

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
