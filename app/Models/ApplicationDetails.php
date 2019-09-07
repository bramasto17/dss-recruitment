<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationDetails extends Model
{
    use SoftDeletes;

    protected $table      = 'application_details';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];

	public function application()
    {
        return $this->belongTo('App\Models\Applications', 'id', 'application_id');
    }

    public function requirement()
    {
        return $this->belongTo('App\Models\JobRequirements', 'id', 'job_requirement_id');
    }
}