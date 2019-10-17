<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicQualification extends Model
{
    protected $table = 'academic_qualifications';
    protected $primaryKey ='sid';
    protected $fillable = ['sid','qualification','awarding_institution','start_date','finish_date','level','class'];
    protected $dates = ['start_date','finish_date','created_at','updated_at'];

    public function getDegree(){
        $deg = Degree::select('name')->where('id', $this->level)->value('name');
        return $deg;
    }
}
