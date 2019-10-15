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
        return $this->skills->sum('grade');
    }

    public function getExpectationScoreAttribute()
    {
        return $this->expectations->sum('grade');
    }
}