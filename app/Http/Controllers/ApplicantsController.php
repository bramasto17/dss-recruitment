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
        // dd($results);

        return view('hrms.applicants.list', compact('results'));
    }

    public function add()
    {
        $departments = $this->applicantsService->getDepartments();

        return view('hrms.applicants.add', compact('departments'));
    }

    public function create(Request $request)
    {
        $attributes = $request->all();
        $result = $this->applicantsService->createOrUpdate($attributes);
        dd($result);

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
}
