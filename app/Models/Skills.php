<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skills extends Model
{
    use SoftDeletes;

    protected $table      = 'skills';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];
	protected $appends    = ['grade'];

    public function type()
    {
        return $this->belongsTo('App\Models\SkillTypes', 'skill_type_id', 'id');
    }

    public function applicantSkills()
    {
        return $this->hasMany('App\Models\ApplicantSkills', 'skill_id', 'id');
    }

    public function jobRequirements()
    {
        return $this->hasMany('App\Models\JobRequirements', 'skill_id', 'id');
    }

    public function getGradeAttribute()
    {
    	if($this->skill_type_id == 1) $mul = 1;
    	else if($this->skill_type_id == 2) $mul = 1.5;
    	else if($this->skill_type_id == 3) $mul = 2;
    	else $mul = 0;

        // if($this->id == $this->applicantSkills->applicant->applications->job->requirements->id) $mul = $mul * 3;

        return ($this->type->grade * $mul);
    }
}