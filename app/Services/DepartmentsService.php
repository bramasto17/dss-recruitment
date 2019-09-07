<?php

namespace App\Services;

use App\Models\Departments;

class DepartmentsService extends \App\Services\BaseService
{
    public function __construct(
        
    ) {
        
    }

    public function getAll($attributes = [])
    {
        $results = $this->queryBuilder(Departments::class, $attributes, [])->get()->toArray();

        return $results;
    }

    public function getById($id)
    {
        $result = Departments::where('id', $id)->firstOrFail()->toArray();

        return $result;
    }

    public function create(array $data)
    {
        // dd($data);
    	return $this->atomic(function() use ($data) {
	        $result = Departments::create($data)->toArray();

	        return $result;
    	});
    }

    public function update(array $data, $id)
    {
    	return $this->atomic(function() use ($data, $id) {
	        Departments::where('id', $id)->update($data);

	        $result = Departments::where('id', $id)->firstOrFail()->toArray();

	        return $result;
    	});
    }

    public function delete($id)
    {
        Departments::where('id', $id)->delete();
    }
}
