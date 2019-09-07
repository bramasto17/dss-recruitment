<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departments extends Model
{
    use SoftDeletes;

    protected $table      = 'departments';
	protected $guarded    = array('id');
	protected $dates      = ['created_at', 'updated_at', 'deleted_at'];

    public function positions()
    {
        return $this->hasMany('App\Models\Positions', 'id', 'departnent_id');
    }
}