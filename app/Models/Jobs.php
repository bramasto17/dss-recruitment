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
        return $this->belongTo('App\Models\Positions', 'id', 'position_id');
    }

    public function type()
    {
        return $this->belongTo('App\Models\JobTypes', 'id', 'job_type_id');
    }
}