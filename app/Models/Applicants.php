<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicants extends Model
{
    use SoftDeletes;

    protected $table      = 'applicants';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];

	public function application()
    {
        return $this->hasOne('App\Models\Applications', 'id', 'applicant_id');
    }
}