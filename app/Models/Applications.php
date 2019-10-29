<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applications extends Model
{
    use SoftDeletes;

    protected $table      = 'applications';
	protected $guarded    = array('id');
    protected $dates      = ['created_at', 'updated_at', 'deleted_at'];
	protected $appends    = ['education_score', 'career_score', 'skill_score', 'age_score', 'marital_score', 'criteria_score'];

	public function applicant()
    {
        return $this->belongsTo('App\Models\Applicants', 'applicant_id', 'id');
    }

    public function job()
    {
        return $this->belongsTo('App\Models\Jobs', 'job_id', 'id');
    }

    // public function getRequirementScoreAttribute()
    // {
    //     return $this->requirements->sum('grade');
    // }

    public function getEducationScoreAttribute()
    {
        return $this->applicant->education_score;
    }

    public function getCareerScoreAttribute()
    {
        return $this->applicant->career_score;
    }

    public function getSkillScoreAttribute()
    {
        return $this->applicant->skill_score;
    }

    public function getAgeScoreAttribute()
    {
        return $this->applicant->age_score;
    }

    public function getMaritalScoreAttribute()
    {
        return $this->applicant->marital_score;
    }

    public function getCriteriaScoreAttribute()
    {
        return [
            // 'requirement_score' => $this->requirements->sum('grade'),
            'education_score' => $this->applicant->education_score,
            'career_score' => $this->applicant->career_score,
            'skill_score' => $this->applicant->skill_score,
            'age_score' => $this->applicant->age_score,
            'marital_score' => $this->applicant->marital_score,
        ];
    }
}