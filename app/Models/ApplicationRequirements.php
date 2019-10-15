<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationRequirements extends Model
{
    use SoftDeletes;

    protected $table      = 'application_requirements';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];

	public function application()
    {
        return $this->belongsTo('App\Models\Applications', 'application_id', 'id');
    }

    public function requirement()
    {
        return $this->belongsTo('App\Models\JobRequirements', 'job_requirement_id', 'id');
    }
}