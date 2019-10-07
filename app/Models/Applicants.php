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

	public function applications()
    {
        return $this->hasMany('App\Models\Applications', 'id', 'applicant_id');
    }

    public function careers()
    {
        return $this->hasMany('App\Models\ApplicantCareers', 'id', 'applicant_id');
    }

    public function educations()
    {
        return $this->hasMany('App\Models\ApplicantEducations', 'id', 'applicant_id');
    }

    public function expectations()
    {
        return $this->hasMany('App\Models\ApplicantExpectations', 'id', 'applicant_id');
    }

    public function skills()
    {
        return $this->hasMany('App\Models\ApplicantSkills', 'id', 'applicant_id');
    }
}