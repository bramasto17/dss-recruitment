<?php

namespace App\Http\Controllers;

use App\Services\ApplicationsService;

use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    private $applicationsService;

    public function __construct(ApplicationsService $applicationsService) {
        $this->applicationsService = $applicationsService;    
    }

    public function getAll(Request $request)
    {
        $attributes = $request->all();
        $results = $this->applicationsService->getAll($attributes);
        // dd($results);

        return view('hrms.applications.list', compact('results'));
    }

    public function getById($id, Request $request)
    {
        $attributes = $request->all();
        $result = $this->applicationsService->getById($id, $attributes);
        // dd($result);

        return view('hrms.applications.detail', compact('result'));
    }

    public function getScoring(Request $request)
    {
        $attributes = $request->all();
        $results = $this->applicationsService->getScoring($attributes);
        // dd($results);

        return view('hrms.applications.scoring', compact('results'));
    }

    public function updateScoring(Request $request)
    {
        $attributes = array_except($request->all(), ['_token']);
        $result = $this->applicationsService->updateScoring($attributes);

        return redirect('scoring');
    }
}
