<?php

namespace App\Http\Controllers;

use App\Services\JobsService;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    private $jobsService;

    public function __construct(JobsService $jobsService) {
        $this->jobsService = $jobsService;    
    }

    public function getAll(Request $request)
    {
        $attributes = $request->all();
        $results = $this->jobsService->getAll($attributes);

        return view('hrms.jobs.list', compact('results'));
    }

    public function add()
    {
        $positions = $this->jobsService->getPositions();
        $job_types = $this->jobsService->getJobTypes();
        $job_requirement_types = $this->jobsService->getJobRequirementTypes();

        return view('hrms.jobs.add', compact('positions','job_types','job_requirement_types'));
    }

    public function create(Request $request)
    {
        $attributes = $request->all();
        $result = $this->jobsService->create($attributes);

        \Session::flash('flash_message', 'Job successfully Created!');
        return redirect('jobs');
    }

    public function edit($id)
    {
        $positions = $this->jobsService->getPositions();
        $job_types = $this->jobsService->getJobTypes();
        $job_requirement_types = $this->jobsService->getJobRequirementTypes();
        $result = $this->jobsService->getById($id);
        // dd($result);

        return view('hrms.jobs.edit', compact('result', 'positions','job_types','job_requirement_types'));
    }

    public function update(Request $request, $id){
        $attributes = array_except($request->all(), ['_token']);
        $result = $this->jobsService->update($attributes, $id);

        \Session::flash('flash_message', 'Job successfully Updated!');
        return redirect('jobs');
    }

    public function delete($id)
    {
        $this->jobsService->delete($id);

        \Session::flash('flash_message', 'Job successfully Deleted!');
        return redirect('jobs');
    }
}
