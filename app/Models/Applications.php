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

	public function applicant()
    {
        return $this->belongTo('App\Models\Applicants', 'id', 'applicant_id');
    }
}