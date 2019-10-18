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
                'name' => 'expectation_score',
                'weight' => 1,
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

        $result = $this->normalizeCriteriasScore($result);

        return $result;
    }

    protected function normalizeCriteriasScore($result)
    {
        // dd(sizeof($result['applications']));
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