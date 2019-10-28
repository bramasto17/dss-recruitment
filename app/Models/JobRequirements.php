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
        return $this->belongsTo('App\Models\Jobs', 'job_id', 'id');
    }

    public function skill()
    {
        return $this->belongsTo('App\Models\Skills', 'skill_id', 'id');
    }
}