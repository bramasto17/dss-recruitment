<?php

namespace App\Http\Controllers;

use App\Services\ApplicantsService;

use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    private $applicantsService;

    public function __construct(ApplicantsService $applicantsService) {
        $this->applicantsService = $applicantsService;    
    }

    public function getAll(Request $request)
    {
        $attributes = $request->all();
        $results = $this->applicantsService->getAll($attributes);

        return view('hrms.applicants.list', compact('results'));
    }

    public function add()
    {
        $religions = $this->applicantsService->getReligions();
        $career_statuses = $this->applicantsService->getCareerStatuses();
        $education_statuses = $this->applicantsService->getEducationStatuses();
        $jobs = $this->applicantsService->getJobs();
        $skills = $this->applicantsService->getSkills();

        return view('hrms.applicants.add', compact('religions','career_statuses','education_statuses','jobs','skills'));
    }

    public function create(Request $request)
    {
        $attributes = $request->all();
        dd($attributes);
        $result = $this->applicantsService->createOrUpdate($attributes);

        \Session::flash('flash_message', 'Applicant successfully Created!');
        return redirect('applicants');
    }

    public function edit($id)
    {
        // $departments = $this->applicantsService->getDepartments();
        $result = $this->applicantsService->getById($id);

        return view('hrms.applicants.edit', compact('result'));
    }

    public function update(Request $request, $id){
        $attributes = array_except($request->all(), ['_token']);
        $result = $this->applicantsService->createOrUpdate($attributes);
        dd($result);

        \Session::flash('flash_message', 'Applicant successfully Updated!');
        return redirect('applicants');
    }

    public function delete($id)
    {
        $this->applicantsService->delete($id);

        \Session::flash('flash_message', 'Applicant successfully Deleted!');
        return redirect('applicants');
    }

    public function getJobData($id)
    {
        // $departments = $this->applicantsService->getDepartments();
        $result = $this->applicantsService->getJobData($id);
        $grades = $this->applicantsService->getGrades();

        $returnHTML = view('hrms.applicants.job-data',compact('result','grades'))->render();
        // return response()->json(['html'=>$result]);
        return response()->json(['html'=>$returnHTML]);
    }
}
