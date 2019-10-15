<?php

namespace App\Services;

use App\Models\Applicants;
use App\Models\ApplicantCareers;
use App\Models\ApplicantEducations;
use App\Models\ApplicantExpectations;
use App\Models\ApplicantSkills;
use App\Models\Applications;
use App\Models\ApplicationRequirements;
use App\Services\JobsService;

class ApplicantsService extends \App\Services\BaseService
{
    private $jobsService;

    private $include = ['careers','educations','expectations','skills','applications','applications.requirements'];

    public function __construct(JobsService $jobsService) {
        $this->jobsService = $jobsService;
    }

    public function getAll($attributes = [])
    {
        $results = $this->queryBuilder(Applicants::class, $attributes, $this->include)->get()->toArray();

        return $results;
    }

    public function getById($id)
    {
        $result = Applicants::with($this->include)->where('id', $id)->firstOrFail()->toArray();

        dd($result);

        return $result;
    }

    public function createOrUpdate(array $data)
    {
    	return $this->atomic(function() use ($data) {
            $data = [
                'applicant' => [
                    // 'id' => 119,
                    'name' => 'Bramasto Wibisono',
                    'birthday' => '1997-07-20',
                    'address' => 'BSD',
                    'marital_status' => 0,
                    'phone' => '+6285718789603',
                    'email' => 'bram@wibi.com',
                    'id_card_no' => '1231231231231',
                    'id_card_address' => 'BSD',
                    'npwp_no' => '1231231231231',
                    'gender' => 'Male',
                    'religion' => 'Islam',
                ],
                'careers' => [
                    [
                        // 'id' => 237,
                        'position' => 'Associate Member Web Developer',
                        'company_name' => 'IT Division Binus School International',
                        'career_start' => '2017-03-01',
                        'career_end' => '2017-12-31',
                        'grade' => 4,
                    ],
                    [
                        // 'id' => 238,
                        'position' => 'Software Engineer Intern',
                        'company_name' => 'Bridestory (PT. Cerita Bahagia)',
                        'career_start' => '2018-08-13',
                        'career_end' => '2019-02-28',
                        'grade' => 4,
                    ],
                ],
                'educations' => [
                    [
                        // 'id' => 237,
                        'stage' => 'SMA',
                        'name' => 'SMA Islam Al Azhar BSD',
                        'grade' => 4,
                    ],
                    [
                        // 'id' => 238,
                        'stage' => 'S1',
                        'name' => 'Binus University',
                        'grade' => 5,
                    ],
                ],
                'skills' => [
                    [
                        // 'id' => 945,
                        'skill_type_id' => 1,
                        'name' => 'Bahasa Indonesia',
                        'grade' => 5,
                    ],
                    [
                        // 'id' => 946,
                        'skill_type_id' => 1,
                        'name' => 'English',
                        'grade' => 5,
                    ],
                    [
                        // 'id' => 947,
                        'skill_type_id' => 2,
                        'name' => 'Cepat Belajar',
                        'grade' => 5,
                    ],
                    [
                        // 'id' => 948,
                        'skill_type_id' => 2,
                        'name' => 'Komunikasi',
                        'grade' => 3,
                    ],
                    [
                        // 'id' => 949,
                        'skill_type_id' => 2,
                        'name' => 'Adaptasi',
                        'grade' => 2,
                    ],
                    [
                        // 'id' => 950,
                        'skill_type_id' => 3,
                        'name' => 'PHP',
                        'grade' => 5,
                    ],
                    [
                        // 'id' => 951,
                        'skill_type_id' => 3,
                        'name' => 'MySQL',
                        'grade' => 4,
                    ],
                    [
                        // 'id' => 952,
                        'skill_type_id' => 3,
                        'name' => 'HTML/JavaScript/CSS',
                        'grade' => 4,
                    ],
                ],
                'expectations' => [
                    [
                        // 'id' => 355,
                        'expectation_id' => 1,
                        'grade' => 1,
                    ],
                    [
                        // 'id' => 356,
                        'expectation_id' => 2,
                        'grade' => 2,
                    ],
                    [
                        // 'id' => 357,
                        'expectation_id' => 3,
                        'grade' => 3,
                    ],
                ],
                'applications' => [
                    [
                        // 'id' => 119,
                        'job_id' => 1,
                        'requirements' => [
                            [
                                // 'id' => 121,
                                'job_requirement_id' => 1,
                                'grade' => 0
                            ],
                            [
                                // 'id' => 122,
                                'job_requirement_id' => 2,
                                'grade' => 3
                            ],
                        ]
                    ]
                ],
            ];

            // $data = [
            //     'applicant' => [
            //         'id' => 119,
            //         'name' => 'Tomas Sinca',
            //         'birthday' => '1992-07-20',
            //         'address' => 'Tangerang Selatan',
            //         'marital_status' => 0,
            //         'phone' => '+6285718781231',
            //         'email' => 'tomas@sinca.com',
            //         'id_card_no' => '3213213213213',
            //         'id_card_address' => 'Tangerang Selatan',
            //         'npwp_no' => '3213213213213',
            //         'gender' => 'Male',
            //         'religion' => 'Christian',
            //     ],
            //     'careers' => [
            //         [
            //             'id' => 237,
            //             'position' => 'Front End Intern',
            //             'company_name' => 'Tokopedia',
            //             'career_start' => '2017-03-01',
            //             'career_end' => '2017-12-31',
            //             'grade' => 5,
            //         ]
            //     ],
            //     'educations' => [
            //         [
            //             'id' => 237,
            //             'stage' => 'SMA',
            //             'name' => 'SMA BPK Penabur',
            //             'grade' => 3,
            //         ],
            //         [
            //             'id' => 238,
            //             'stage' => 'S1',
            //             'name' => 'Universitas Multimedia Nasional',
            //             'grade' => 4,
            //         ],
            //     ],
            //     'skills' => [
            //         [
            //             'id' => 945,
            //             'skill_type_id' => 1,
            //             'name' => 'Bahasa Indonesia Tes',
            //             'grade' => 5,
            //         ],
            //         [
            //             'id' => 946,
            //             'skill_type_id' => 1,
            //             'name' => 'English Tes',
            //             'grade' => 5,
            //         ],
            //         [
            //             'id' => 949,
            //             'skill_type_id' => 2,
            //             'name' => 'Adaptasi',
            //             'grade' => 5,
            //         ],
            //         [
            //             'id' => 950,
            //             'skill_type_id' => 3,
            //             'name' => 'PHP',
            //             'grade' => 3,
            //         ],
            //         [
            //             'id' => 951,
            //             'skill_type_id' => 3,
            //             'name' => 'MySQL',
            //             'grade' => 3,
            //         ],
            //         [
            //             'id' => 952,
            //             'skill_type_id' => 3,
            //             'name' => 'HTML/JavaScript/CSS',
            //             'grade' => 4,
            //         ],
            //         [
            //             'id' => 952,
            //             'skill_type_id' => 3,
            //             'name' => 'Vue.JS',
            //             'grade' => 5,
            //         ],
            //         [
            //             'id' => 952,
            //             'skill_type_id' => 3,
            //             'name' => 'Angular.JS',
            //             'grade' => 4,
            //         ],
            //     ],
            //     'expectations' => [
            //         [
            //             'id' => 355,
            //             'expectation_id' => 1,
            //             'grade' => 0,
            //         ],
            //         [
            //             'id' => 356,
            //             'expectation_id' => 2,
            //             'grade' => 3,
            //         ],
            //         [
            //             'id' => 357,
            //             'expectation_id' => 3,
            //             'grade' => 5,
            //         ],
            //     ],
            //     'applications' => [
            //         [
            //             'id' => 119,
            //             'job_id' => 1,
            //             'requirements' => [
            //                 [
            //                     'id' => 121,
            //                     'job_requirement_id' => 1,
            //                     'grade' => 1
            //                 ],
            //                 [
            //                     'id' => 122,
            //                     'job_requirement_id' => 2,
            //                     'grade' => 5
            //                 ],
            //             ]
            //         ]
            //     ],
            // ];

            // dd($data);

	        $applicant = $this->buildAndCreateOrUpdateApplicant($data);
            $data['applicant']['id'] = $applicant['id'];
            
            $careers = $this->buildAndCreateOrUpdateCareers($data);
            $educations = $this->buildAndCreateOrUpdateEducations($data);
            $skills = $this->buildAndCreateOrUpdateSkills($data);
            $expectations = $this->buildAndCreateOrUpdateExpectations($data);

            //build Applications and Application Details
            $applications = $this->buildAndCreateOrUpdateApplications($data);

            $applicant['careers'] = $careers;
            $applicant['educations'] = $educations;
            $applicant['skills'] = $skills;
            $applicant['expectations'] = $expectations;
            $applicant['applications'] = $applications;
            $result = $applicant;

	        return $result;
    	});
    }

    public function update(array $data, $id)
    {
    	return $this->atomic(function() use ($data, $id) {
	        Applicants::where('id', $id)->update($data);

	        $result = Applicants::where('id', $id)->firstOrFail()->toArray();

	        return $result;
    	});
    }

    public function delete($id)
    {
        Applicants::where('id', $id)->delete();
    }

    public function getJobs()
    {
        return $this->jobsService->getAll(null);
    }

    protected function buildAndCreateOrUpdateApplicant(array $data)
    {
        $applicant = $data['applicant'];
        if(!@$applicant['id']){
            $result = Applicants::create($applicant)->toArray();
        }
        else{
            Applicants::where('id',$applicant['id'])->update($applicant);
            $result = Applicants::where('id',$applicant['id'])->firstOrFail()->toArray();
        }

        return $result;
    }

    protected function buildAndCreateOrUpdateCareers(array $data)
    {
        $results = [];

        $careers = $data['careers'];

        foreach ($careers as $career) {
            $career['applicant_id'] = $data['applicant']['id'];

            if(!@$career['id']){
                $results[] = ApplicantCareers::create($career)->toArray();
            }
            else{
                ApplicantCareers::where('id',$career['id'])->update($career);
                $results[] = ApplicantCareers::where('id',$career['id'])->firstOrFail()->toArray();
            }
        }

        return $results;
    }

    protected function buildAndCreateOrUpdateEducations(array $data)
    {
        $results = [];

        $educations = $data['educations'];

        foreach ($educations as $education) {
            $education['applicant_id'] = $data['applicant']['id'];

            if(!@$education['id']){
                $results[] = ApplicantEducations::create($education)->toArray();
            }
            else{
                ApplicantEducations::where('id',$education['id'])->update($education);
                $results[] = ApplicantEducations::where('id',$education['id'])->firstOrFail()->toArray();
            }
        }

        return $results;
    }

    protected function buildAndCreateOrUpdateSkills(array $data)
    {
        $results = [];

        $skills = $data['skills'];

        foreach ($skills as $skill) {
            $skill['applicant_id'] = $data['applicant']['id'];

            if(!@$skill['id']){
                $results[] = ApplicantSkills::create($skill)->toArray();
            }
            else{
                ApplicantSkills::where('id',$skill['id'])->update($skill);
                $results[] = ApplicantSkills::where('id',$skill['id'])->firstOrFail()->toArray();
            }
        }

        return $results;
    }

    protected function buildAndCreateOrUpdateExpectations(array $data)
    {
        $results = [];

        $expectations = $data['expectations'];

        foreach ($expectations as $expectation) {
            $expectation['applicant_id'] = $data['applicant']['id'];
            if(!@$expectation['id']){
                $results[] = ApplicantExpectations::create($expectation)->toArray();
            }
            else{
                ApplicantExpectations::where('id',$expectation['id'])->update($expectation);
                $results[] = ApplicantExpectations::where('id',$expectation['id'])->firstOrFail()->toArray();
            }
        }

        return $results;
    }

    protected function buildAndCreateOrUpdateApplications(array $data)
    {
        $results = [];

        $applications = $data['applications'];

        foreach ($applications as $application) {
            $application_requirements = $application['requirements'];
            $application['applicant_id'] = $data['applicant']['id'];
            unset($application['requirements']);
            
            if(!@$application['id']){
                $application = Applications::create($application)->toArray();
            }
            else{
                Applications::where('id',$application['id'])->update($application);
                $application = Applications::where('id',$application['id'])->firstOrFail()->toArray();
            }

            $requirements = [];
            foreach ($application_requirements as $application_requirement) {
                $application_requirement['application_id'] = $application['id'];

                if(!@$application_requirement['id']){
                    $requirements[] = ApplicationRequirements::create($application_requirement)->toArray();
                }
                else{
                    ApplicationRequirements::where('id',$application_requirement['id'])->update($application_requirement);
                    $requirements[] = ApplicationRequirements::where('id',$application_requirement['id'])->firstOrFail()->toArray();
                }
            }

            $application['requirements'] = $requirements;

            $results[] = $application;
        }

        return $results;
    }
}
