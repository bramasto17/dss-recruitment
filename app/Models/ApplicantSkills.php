<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantSkills extends Model
{
    use SoftDeletes;

    protected $table      = 'applicant_skills';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];
	protected $appends    = ['grade'];

	public function applicant()
    {
        return $this->belongsTo('App\Models\Applicants', 'applicant_id', 'id');
    }

    public function skill()
    {
        return $this->belongsTo('App\Models\Skills', 'skill_id', 'id');
    }

    public function getGradeAttribute()
    {
        return $this->skill->grade;
    }
}