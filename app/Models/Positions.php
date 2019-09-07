<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Positions extends Model
{
    use SoftDeletes;

    protected $table      = 'positions';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];
	
    public function department()
    {
        return $this->belongTo('App\Models\Departments', 'id', 'departnent_id');
    }
}