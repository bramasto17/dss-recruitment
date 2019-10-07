<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantEducations extends Model
{
    use SoftDeletes;

    protected $table      = 'applicant_educations';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];

	public function applicant()
    {
        return $this->belongsTo('App\Models\Applicants', 'id', 'applicant_id');
    }
}