<?php

namespace App\Services;

use App\Models\Positions;
use App\Services\DepartmentsService;

class PositionsService extends \App\Services\BaseService
{
    private $departmentsService;
    public function __construct(DepartmentsService $departmentsService) {
        $this->departmentsService = $departmentsService;
    }

    public function getAll($attributes = [])
    {
        $results = $this->queryBuilder(Positions::class, $attributes, ['department'])->get()->toArray();

        return $results;
    }

    public function getById($id)
    {
        $result = Positions::where('id', $id)->firstOrFail()->toArray();

        return $result;
    }

    public function create(array $data)
    {
        // dd($data);
    	return $this->atomic(function() use ($data) {
	        $result = Positions::create($data)->toArray();

	        return $result;
    	});
    }

    public function update(array $data, $id)
    {
    	return $this->atomic(function() use ($data, $id) {
	        Positions::where('id', $id)->update($data);

	        $result = Positions::where('id', $id)->firstOrFail()->toArray();

	        return $result;
    	});
    }

    public function delete($id)
    {
        Positions::where('id', $id)->delete();
    }

    public function getDepartments()
    {
        return $this->departmentsService->getAll(null);
    }
}
