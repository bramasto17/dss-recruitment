<?php

namespace App\Http\Controllers;

use App\Services\DepartmentsService;

use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    private $departmentsService;

    public function __construct(DepartmentsService $departmentsService) {
        $this->departmentsService = $departmentsService;    
    }

    public function getAll(Request $request)
    {
        $attributes = $request->all();
        $results = $this->departmentsService->getAll($attributes);

        return view('hrms.departments.list', compact('results'));
    }

    public function add()
    {
        return view('hrms.departments.add');
    }

    public function create(Request $request)
    {
        $attributes = $request->all();
        $result = $this->departmentsService->create($attributes);

        \Session::flash('flash_message', 'Department successfully Created!');
        return redirect('departments');
    }

    public function edit($id)
    {
        $result = $this->departmentsService->getById($id);

        return view('hrms.departments.edit', compact('result'));
    }

    public function update(Request $request, $id){
        $attributes = array_except($request->all(), ['_token']);
        $result = $this->departmentsService->update($attributes, $id);

        \Session::flash('flash_message', 'Department successfully Updated!');
        return redirect('departments');
    }

    public function delete($id)
    {
        $this->departmentsService->delete($id);

        \Session::flash('flash_message', 'Department successfully Deleted!');
        return redirect('departments');
    }
}
