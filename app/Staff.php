<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;


class Staff extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;

    protected $table = 'staff';
    protected $primaryKey = 'sid';
    protected $fillable = [
        'sid','first_name','last_name','middle_name','post','department_id','pob','dob','lga','sex',
        'state','nationality','perm_home_address','current_postal_position','phone_number',
        'email','marital_status','number_of_children','institutions_attended','academic_qualifications',
        'appointment_date','rank','appointment_confirmation','passport','password','religion','faculty_id','role_id'
    ];
    protected $dates = ['dob','appointment_confirmation','appointment_date','created_at','updated_at'];
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

    public function getAge(){
        $age = date('Y') - $this->dob->format('Y');
        return $age;
    }

    public function getFullName(){
        $full_name = $this->first_name.' '.$this->middle_name.' '.$this->last_name;
        return $full_name;
    }

    public function getDepartment(){
        $dept = Department::select('name')->where('id', $this->department_id)->value('name');
        return $dept;
    }

    public function getFaculty(){
        $fac = Faculty::select('name')->where('id', $this->faculty_id)->value('name');
        return $fac;
    }

    public static function getQualifications($sid){
        $acad1 = AcademicQualification::where('sid',$sid)->get();
        $acad = $acad1->toArray();
        return $acad;
    }

    public function getRank(){
        $rank = Rank::select('name')->where('id', $this->rank)->value('name');
        return $rank;
    }

    public function getStatus(){
        if ($this->status == 0){
            return false;
        }else{
            return true;
        }
    }
}
