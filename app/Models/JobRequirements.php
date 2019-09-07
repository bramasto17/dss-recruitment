<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobRequirements extends Model
{
    use SoftDeletes;

    protected $table      = 'job_requirements';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];
	
    public function job()
    {
        return $this->belongTo('App\Models\Jobs', 'id', 'job_id');
    }

    public function type()
    {
        return $this->belongTo('App\Models\JobRequirementTypes', 'id', 'job_type_id');
    }
}