<?php

namespace App\Services;

use App\Models\Applicants;
use App\Models\ApplicantCareers;
use App\Models\ApplicantEducations;
use App\Models\ApplicantExpectations;
use App\Models\ApplicantSkills;
use App\Models\Applications;
use App\Models\ApplicationRequirements;
use App\Models\CareerStatuses;
use App\Models\EducationStatuses;
use App\Models\Expectations;
use App\Models\Skills;
use App\Services\JobsService;

class ApplicantsService extends \App\Services\BaseService
{
    private $jobsService;

    private $include = ['careers','educations','expectations','skills','applications', 'applications.job', 'applications.job.type', 'applications.job.position', 'applications.requirements'];

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
            // $data = [
            //     'applicant' => [
            //         // 'id' => 119,
            //         'name' => 'Bramasto Wibisono',
            //         'birthday' => '1997-07-20',
            //         'address' => 'BSD',
            //         'marital_status' => 0,
            //         'phone' => '+6285718789603',
            //         'email' => 'bram@wibi.com',
            //         'id_card_no' => '1231231231231',
            //         'id_card_address' => 'BSD',
            //         'npwp_no' => '1231231231231',
            //         'gender' => 'Male',
            //         'religion' => 'Islam',
            //     ],
            //     'careers' => [
            //         [
            //             // 'id' => 237,
            //             'position' => 'Associate Member Web Developer',
            //             'company_name' => 'IT Division Binus School International',
            //             'career_start' => '2017-03-01',
            //             'career_end' => '2017-12-31',
            //             'grade' => 4,
            //         ],
            //         [
            //             // 'id' => 238,
            //             'position' => 'Software Engineer Intern',
            //             'company_name' => 'Bridestory (PT. Cerita Bahagia)',
            //             'career_start' => '2018-08-13',
            //             'career_end' => '2019-02-28',
            //             'grade' => 4,
            //         ],
            //     ],
            //     'educations' => [
            //         [
            //             // 'id' => 237,
            //             'stage' => 'SMA',
            //             'name' => 'SMA Islam Al Azhar BSD',
            //             'grade' => 4,
            //         ],
            //         [
            //             // 'id' => 238,
            //             'stage' => 'S1',
            //             'name' => 'Binus University',
            //             'grade' => 5,
            //         ],
            //     ],
            //     'skills' => [
            //         [
            //             // 'id' => 945,
            //             'skill_type_id' => 1,
            //             'name' => 'Bahasa Indonesia',
            //             'grade' => 5,
            //         ],
            //         [
            //             // 'id' => 946,
            //             'skill_type_id' => 1,
            //             'name' => 'English',
            //             'grade' => 5,
            //         ],
            //         [
            //             // 'id' => 947,
            //             'skill_type_id' => 2,
            //             'name' => 'Cepat Belajar',
            //             'grade' => 5,
            //         ],
            //         [
            //             // 'id' => 948,
            //             'skill_type_id' => 2,
            //             'name' => 'Komunikasi',
            //             'grade' => 3,
            //         ],
            //         [
            //             // 'id' => 949,
            //             'skill_type_id' => 2,
            //             'name' => 'Adaptasi',
            //             'grade' => 2,
            //         ],
            //         [
            //             // 'id' => 950,
            //             'skill_type_id' => 3,
            //             'name' => 'PHP',
            //             'grade' => 5,
            //         ],
            //         [
            //             // 'id' => 951,
            //             'skill_type_id' => 3,
            //             'name' => 'MySQL',
            //             'grade' => 4,
            //         ],
            //         [
            //             // 'id' => 952,
            //             'skill_type_id' => 3,
            //             'name' => 'HTML/JavaScript/CSS',
            //             'grade' => 4,
            //         ],
            //     ],
            //     'expectations' => [
            //         [
            //             // 'id' => 355,
            //             'expectation_id' => 1,
            //             'grade' => 1,
            //         ],
            //         [
            //             // 'id' => 356,
            //             'expectation_id' => 2,
            //             'grade' => 2,
            //         ],
            //         [
            //             // 'id' => 357,
            //             'expectation_id' => 3,
            //             'grade' => 3,
            //         ],
            //     ],
            //     'applications' => [
            //         [
            //             // 'id' => 119,
            //             'job_id' => 1,
            //             'requirements' => [
            //                 [
            //                     // 'id' => 121,
            //                     'job_requirement_id' => 1,
            //                     'grade' => 0
            //                 ],
            //                 [
            //                     // 'id' => 122,
            //                     'job_requirement_id' => 2,
            //                     'grade' => 3
            //                 ],
            //             ]
            //         ]
            //     ],
            // ];

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

	        $applicant = $this->buildAndCreateApplicant($data);
            $data['id'] = $applicant['id'];

            $careers = $this->buildAndCreateCareers($data);
            $educations = $this->buildAndCreateEducations($data);
            $skills = $this->buildAndCreateSkills($data);

            $applications = $this->buildAndCreateApplication($data);

            $applicant['careers'] = $careers;
            $applicant['educations'] = $educations;
            $applicant['skills'] = $skills;
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

    public function getJobData($id)
    {
        return $this->jobsService->getById($id);
    }

    public function getSkills()
    {
        $results = $this->queryBuilder(Skills::class, [], [])->get()->toArray();

        return $results;
    }

    public function getExpectations()
    {
        $results = $this->queryBuilder(Expectations::class, [], [])->get()->toArray();

        return $results;
    }

    public function getReligions()
    {
        $results = [
            'Islam',
            'Christian',
            'Catholic',
            'Hindu',
            'Buddha',
            'Kong Hu Cu',
        ];

        return $results;
    }

    public function getEducationStatuses()
    {
        $results = $this->queryBuilder(EducationStatuses::class, [], [])->get()->toArray();

        return $results;
    }

    public function getCareerStatuses()
    {
        $results = $this->queryBuilder(CareerStatuses::class, [], [])->get()->toArray();

        return $results;
    }

    public function getGrades()
    {
        $results = [
            '1',
            '2',
            '3',
            '4',
            '5',
        ];

        return $results;
    }

    protected function buildAndCreateApplicant(array $data)
    {
        $applicant = [
            'name' => $data['name'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'marital_status' => $data['marital_status'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'id_card_no' => $data['id_card_no'],
            'id_card_address' => $data['id_card_address'],
            'npwp_no' => $data['npwp_no'],
            'gender' => $data['gender'],
            'religion' => $data['religion'],
        ];

        $result = Applicants::create($applicant)->toArray();

        return $result;
    }

    protected function buildAndCreateCareers(array $data)
    {
        $results = [];

        foreach ($data['career_position'] as $key => $value) {
            $career = [
                'applicant_id' => $data['id'],
                'position' => $data['career_position'][$key],
                'company_name' => $data['career_company'][$key],
                'career_status_id' => $data['career_status'][$key],
            ];

            $results[] = ApplicantCareers::create($career)->toArray();
        }

        return $results;
    }

    protected function buildAndCreateEducations(array $data)
    {
        $results = [];

        foreach ($data['education_name'] as $key => $value) {
            $education = [
                'applicant_id' => $data['id'],
                'stage' => '',
                'name' => $data['education_name'][$key],
                'education_status_id' => $data['education_stage'][$key],
            ];

            $results[] = ApplicantEducations::create($education)->toArray();
        }

        return $results;
    }

    protected function buildAndCreateSkills(array $data)
    {
        $results = [];

        foreach ($data['skill_id'] as $key => $value) {
            $skill = [
                'applicant_id' => $data['id'],
                'skill_id' => $data['skill_id'][$key],
            ];

            $results[] = ApplicantSkills::create($skill)->toArray();
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

    protected function buildAndCreateApplication(array $data)
    {
        $application = [
            'applicant_id' => $data['id'],
            'job_id' => $data['job_id'],
        ];

        $result = Applications::create($application)->toArray();

        return $result;
    }
}
