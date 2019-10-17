<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoringSystem extends Model
{
    protected $guarded = ['id'];

    protected $table = 'scoring_system';

    public function user()
    {
        return $this->belongsTo('Staff', 'sid', 'sid');
    }

    public function evaluator()
    {
        return $this->belongsTo('Staff', 'sid');
    }

    public function aper(){
        return $this->belongsTo('AperForm','application_no', 'appno');
    }

    public function checkLastPromotion($id){
        $active = Carbon::now()->format('Y') - $this->aper()->date_of_last_promotion->format('Y');
        if($active > 3){
            return true;
        }else{
            return false;
        }
    }

    public static function getldp($id){
        $lpd = AperForm::select('date_of_last_promotion')->where('application_no', $id)->value('date_of_last_promotion');
        $l = date('Y') - $lpd->format('Y');
        return $l;
    }

    //qualification + referee_report + interview

    public function total(){
       $total = $this->qualification + $this->referee_report + $this->interview;
    }

    public function activeYears($sid){
        $active = Carbon::now()->format('Y') - $this->date_of_last_promotion->format('Y');
        return $active;
    }

}
