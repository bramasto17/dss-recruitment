<?php

namespace App\Services;

use App\Models\Jobs;
use App\Models\JobTypes;
use App\Models\JobRequirements;
use App\Models\Skills;
use App\Services\PositionsService;

class JobsService extends \App\Services\BaseService
{
    private $positionsService;
    public function __construct(PositionsService $positionsService) {
        $this->positionsService = $positionsService;
        $this->include = ['position','position.department','type','requirements','requirements.skill'];
    }

    public function getAll($attributes = [])
    {
        $results = $this->queryBuilder(Jobs::class, $attributes, $this->include)->get()->toArray();

        return $results;
    }

    public function getById($id)
    {
        $result = Jobs::with($this->include)->where('id', $id)->firstOrFail()->toArray();

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
            $job = $this->buildJobData($data);
	        Jobs::where('id', $id)->update($job);

            $data['job_id'] = $id;

            // $jobRequirements = $this->buildJobRequirementsData($data);
            // foreach ($jobRequirements as $value) {
            //     if(@$value['id'] == null){
            //         if($value['name'] != '')  $jobRequirement = JobRequirements::create($value)->toArray();
            //     }
            //     else{
            //         if($value['name'] != '') JobRequirements::where('id', $value['id'])->update($value);
            //     }
            // }

            JobRequirements::where('job_id', $id)->whereNotIn('skill_id',$data['skill_id'])->delete();
            $jobRequirements = $this->buildJobRequirementsData($data);
            foreach ($jobRequirements as $value) {
                if(JobRequirements::where('job_id',$id)->where('skill_id',$value['skill_id'])->exists()){
                    JobRequirements::where('job_id',$id)->where('skill_id',$value['skill_id'])->update($value);
                }
                else{
                    JobRequirements::where('job_id',$id)->where('skill_id',$value['skill_id'])->create($value)->toArray();
                } 
            }


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

    public function getSkills($attributes = [])
    {
        $results = $this->queryBuilder(Skills::class, $attributes, [])->get()->toArray();

        return $results;
    }

    public function buildJobData($data){
        return [
            'position_id' => $data['position_id'],
            'job_type_id' => $data['job_type_id'],
        ];
    }

    public function buildJobRequirementsData($data){
        $return = [];

        foreach ($data['skill_id'] as $value) {
            $return[] = [
                'job_id' => $data['job_id'],
                'skill_id' => $value,
            ];
        }

        return $return;
    }
}
