<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{
    use SoftDeletes;

    protected $table      = 'jobs';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];
	
    public function position()
    {
        return $this->belongsTo('App\Models\Positions', 'position_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\JobTypes', 'job_type_id', 'id');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\JobRequirements', 'job_id', 'id');
    }
}