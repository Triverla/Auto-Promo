<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AperForm extends Model
{
    protected $table = 'aper_form';
    protected $primaryKey = 'sid';
    protected $fillable = [
        'sid','full_name','rank','dob','department','date_of_first_appointment','date_of_confirmation_of_appointment','date_of_last_promotion','last_promotion_rank',
        'present_salary','present_responsiblities','session','staff_comments','application_no','status'
    ];
    protected $dates = ['dob','date_of_first_appointment','date_of_confirmation_of_appointment','date_of_last_promotion','created_at','updated_at'];
    protected $hidden = ['password'];
    public $incrementing = false;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified' => 'boolean',
    ];

    public static function appNumber()
    {
        $appno = mt_rand(100, 999);
        $id = 'APF' . $appno;
        return $id;
    }

    public function staff(){
        return $this->belongsToMany(Staff::class, 'staff')->withTimestamps();
    }

    public function hodapproved(){
        return $this->hasMany('App\HodApprovedApplications', 'aper_id', 'application_no');
    }

    public function facultyapproved(){
        return $this->hasMany('App\FacultyApprovedApplications', 'aper_id', 'application_no');
    }

    public function complexapproved(){
        return $this->hasMany('App\ComplexApprovedApplications', 'aper_id', 'application_no');
    }

    public function hodcomment(){
        return $this->hasMany('App\HodComment', 'aper_id', 'application_no');
    }

    public function facultycomment(){
        return $this->hasMany('App\FacultyComment', 'aper_id', 'application_no');
    }

    public function complexcomment(){
        return $this->hasMany('App\ComplexComment', 'aper_id', 'application_no');
    }

    public function aperform()
    {
        return $this->belongsTo('App\Staff', 'sid', 'sid');
    }
    public function scoring_system()
    {
        return $this->belongsTo('App\ScoringSystem', 'sid', 'sid');
    }

    /**
     *Goal: Staff must have spent more than 3 years to be eligible for promotion
     */
    public function activeYears($sid){
        $active = Carbon::now()->format('Y') - $this->date_of_last_promotion->format('Y');
        return $active;
    }

    public function checkPostVancancy(){
        //To check if a post is vacant or not

    }

    public function checkActiveness($sid){
        if($this->staff()->where('status', '=', 1)->where('sid', $sid)->get()->first()){
            return true;
        }else {
            return false;
        }
    }

    public function check($sid){
        if ($this->where('sid', $sid)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

    public function checkHodApproved($id){
        if ($this->hodapproved()->where('aper_id', $id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

    public function checkFacApproved($id){
        if ($this->facultyapproved()->where('aper_id', $id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

    public function checkComplexApproved($id){
        if ($this->complexapproved()->where('aper_id', $id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

    public function checkhodComment($id){
        if ($this->hodcomment()->where('aper_id', $id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

    public function checkfacultyComment($id){
        if ($this->facultycomment()->where('aper_id', $id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

    public function checkcomplexComment($id){
        if ($this->complexcomment()->where('aper_id', $id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

    public function checkEvac($id){
        if ($this->scoring_system()->where('appno', $id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

    public function lpd($id){
            $lpd = date('Y') - $this->last_promotion_date->format('Y');
            return $lpd;
    }


}
