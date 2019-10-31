<?php

namespace App\Services;

use App\Models\Jobs;
use App\Models\JobTypes;
use App\Models\JobRequirements;
use App\Models\JobRequirementTypes;
use App\Services\PositionsService;

class ApplicationsService extends \App\Services\BaseService
{
    private $positionsService;
    private $include;
    private $criterias;

    public function __construct(PositionsService $positionsService) {
        $this->positionsService = $positionsService;
        $this->include = ['position','position.department','type','applications','applications.applicant'];
        $this->criterias = [
            [
                'name' => 'requirement_score',
                'weight' => 3,
            ],
            [
                'name' => 'education_score',
                'weight' => 1.5,
            ],
            [
                'name' => 'career_score',
                'weight' => 2,
            ],
            [
                'name' => 'skill_score',
                'weight' => 2.5,
            ],
            [
                'name' => 'age_score',
                'weight' => 0.5,
            ],
            [
                'name' => 'marital_score',
                'weight' => 0.5,
            ],
        ];
    }

    public function getAll($attributes = [])
    {
        $results = $this->queryBuilder(Jobs::class, $attributes, $this->include)->get()->toArray();

        return $results;
    }

    public function getById($id, $attributes)
    {
        $result = Jobs::with($this->include)->where('id', $id)->firstOrFail()->toArray();

        $result = $this->calculateRequirementScore($result);

        $result = $this->normalizeCriteriasScore($result);

        return $result;
    }

    protected function calculateRequirementScore($job)
    {
        $job_requirements = JobRequirements::where('job_id',$job['id'])->select('skill_id')->get()->toArray();
        $requirement_skills = [];
        foreach ($job_requirements as $key => $value) {
            $requirement_skills[] = $value['skill_id'];
        }

        foreach ($job['applications'] as &$application) {
            $application['requirement_score'] = 0;
            foreach ($application['applicant']['skills'] as $skill) {
                if(in_array($skill['skill_id'], $requirement_skills)) $application['requirement_score'] += $skill['grade'];
            }

            $application['criteria_score']['requirement_score'] = $application['requirement_score'];
        }

        return $job;
    }

    protected function normalizeCriteriasScore($result)
    {
        $criterias = $this->criterias;
        $applications = [];

        foreach ($criterias as $criteria) {
            foreach ($result['applications'] as &$value) {
                $max_value = max(array_column($result['applications'], $criteria['name']));
                $value['normalize_score'][$criteria['name']] = $value[$criteria['name']]/$max_value;
            }
        }

        foreach ($result['applications'] as &$value) {
            $value['alternative_score'] = 0;
        }

        foreach ($criterias as $criteria) {
            foreach ($result['applications'] as $key => &$value) {
                $value['alternative_score'] += ($value['normalize_score'][$criteria['name']] * $criteria['weight']);
            }
        }

        array_multisort(array_column($result['applications'], 'alternative_score'), SORT_DESC, $result['applications']);

        return $result;
    }
}