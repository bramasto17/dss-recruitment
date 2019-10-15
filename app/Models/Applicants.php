<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicants extends Model
{
    use SoftDeletes;

    protected $table      = 'applicants';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];
    protected $appends    = ['education_score', 'career_score', 'skill_score', 'expectation_score'];

	public function applications()
    {
        return $this->hasMany('App\Models\Applications', 'applicant_id', 'id');
    }

    public function careers()
    {
        return $this->hasMany('App\Models\ApplicantCareers', 'applicant_id', 'id');
    }

    public function educations()
    {
        return $this->hasMany('App\Models\ApplicantEducations', 'applicant_id', 'id');
    }

    public function expectations()
    {
        return $this->hasMany('App\Models\ApplicantExpectations', 'applicant_id', 'id');
    }

    public function skills()
    {
        return $this->hasMany('App\Models\ApplicantSkills', 'applicant_id', 'id');
    }

    public function getEducationScoreAttribute()
    {
        return $this->educations->sum('grade');
    }

    public function getCareerScoreAttribute()
    {
        return $this->careers->sum('grade');
    }

    public function getSkillScoreAttribute()
    {
        $language = $this->skills->where('skill_type_id',1)->sum('grade');
        $soft = $this->skills->where('skill_type_id',2)->sum('grade');
        $hard = $this->skills->where('skill_type_id',3)->sum('grade');

        return ($language * 1) + ($soft * 1.5) + ($hard * 2);
    }

    public function getExpectationScoreAttribute()
    {
        return $this->expectations->sum('grade');
    }
}