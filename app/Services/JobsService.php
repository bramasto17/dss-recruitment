<?php

namespace App\Services;

use App\Models\Jobs;
use App\Models\JobTypes;
use App\Models\JobRequirements;
use App\Models\JobRequirementTypes;
use App\Services\PositionsService;

class JobsService extends \App\Services\BaseService
{
    private $positionsService;
    public function __construct(PositionsService $positionsService) {
        $this->positionsService = $positionsService;
    }

    public function getAll($attributes = [])
    {
        $results = $this->queryBuilder(Jobs::class, $attributes, ['position','position.department','type'])->get()->toArray();

        return $results;
    }

    public function getById($id)
    {
        $result = Jobs::with('position','type','requirements')->where('id', $id)->firstOrFail()->toArray();

        return $result;
    }

    public function create(array $data)
    {
    	return $this->atomic(function() use ($data) {
            $job = $this->buildJobData($data);
	        $job = Jobs::create($job)->toArray();

            $data['job_id'] = $job['id'];

            $jobRequirements = $this->buildJobRequirementsData($data);
            foreach ($jobRequirements as $value) {
                $jobRequirement = JobRequirements::create($value)->toArray();
            }

	        return $job;
    	});
    }

    public function update(array $data, $id)
    {
    	return $this->atomic(function() use ($data, $id) {
	        Jobs::where('id', $id)->update($data);

	        $result = Jobs::where('id', $id)->firstOrFail()->toArray();

	        return $result;
    	});
    }

    public function delete($id)
    {
        Jobs::where('id', $id)->delete();
    }

    public function getPositions()
    {
        return $this->positionsService->getAll(null);
    }

    public function getJobTypes($attributes = [])
    {
        $results = $this->queryBuilder(JobTypes::class, $attributes, [])->get()->toArray();

        return $results;
    }

    public function getJobRequirementTypes($attributes = [])
    {
        $results = $this->queryBuilder(JobRequirementTypes::class, $attributes, [])->get()->toArray();

        return $results;
    }

    public function buildJobData($data){
        return [
            'position_id' => $data['position_id'],
            'job_type_id' => $data['job_type_id'],
        ];
    }

    public function buildJobRequirementsData($data){
        // dd($data);
        $return = [];

        foreach ($data['requirement'] as $key => $value) {
            // dd($key);
            $return[] = [
                'job_id' => $data['job_id'],
                'job_requirement_type_id' => $data['job_requirement_type_id'][$key],
                'name' => $data['requirement'][$key],
                'priority' => $data['priority'][$key],
            ];
        }
        return $return;
    }
}
