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
                'type' => 'benefit',
            ],
            [
                'name' => 'education_score',
                'weight' => 1.5,
                'type' => 'benefit',
            ],
            [
                'name' => 'career_score',
                'weight' => 2,
                'type' => 'benefit',
            ],
            [
                'name' => 'skill_score',
                'weight' => 2.5,
                'type' => 'benefit',
            ],
            [
                'name' => 'age_score',
                'weight' => 0.5,
                'type' => 'cost',
            ],
            [
                'name' => 'marital_score',
                'weight' => 0.5,
                'type' => 'bool_cost',
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
        $result = Jobs::with($this->include)->where('id', $id);

        if(@$attributes['gender']){
            // $result = $result->with('applications', function($query) use ($attributes) {
            //     $query->whereHas('applicant', function($q) use ($attributes) {
            //         $q->where('gender',$attributes['gender']);
            //     });
            // });

            $result = $result->with(['applications' => function($query) use ($attributes) {
                $query->whereHas('applicant', function($q) use ($attributes) {
                    $q->where('gender',$attributes['gender']);
                });
            }]);
        }

        $result = $result->firstOrFail()->toArray();

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
                if($criteria['type'] == 'benefit'){
                    $max_value = max(array_column($result['applications'], $criteria['name']));
                    $value['normalize_score'][$criteria['name']] = $value[$criteria['name']]/$max_value;
                }
                else if($criteria['type'] == 'cost'){
                    $min_value = min(array_column($result['applications'], $criteria['name']));
                    $value['normalize_score'][$criteria['name']] = $min_value/$value[$criteria['name']];
                }
                else if($criteria['type'] == 'bool_cost'){
                    if($value[$criteria['name']] == 0){
                        $value['normalize_score'][$criteria['name']] = 1;
                    }
                    else if($value[$criteria['name']] == 1){
                        $value['normalize_score'][$criteria['name']] = 0;
                    }
                }
            }
        }

        foreach ($result['applications'] as &$value) {
            $value['alternative_score'] = 0;
        }

        foreach ($criterias as $criteria) {
            foreach ($result['applications'] as $key => &$value) {
                // dd($value['normalize_score']);
                $value['alternative_score'] += ($value['normalize_score'][$criteria['name']] * $criteria['weight']);
            }
        }

        foreach ($result['applications'] as &$value) {
            $value['alternative_score'] = number_format((float)$value['alternative_score'], 2, '.', '');
        }

        array_multisort(array_column($result['applications'], 'alternative_score'), SORT_DESC, $result['applications']);

        return $result;
    }
}