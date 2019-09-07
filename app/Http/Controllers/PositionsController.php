<?php

namespace App\Http\Controllers;

use App\Services\PositionsService;

use Illuminate\Http\Request;

class PositionsController extends Controller
{
    private $positionsService;

    public function __construct(PositionsService $positionsService) {
        $this->positionsService = $positionsService;    
    }

    public function getAll(Request $request)
    {
        $attributes = $request->all();
        $results = $this->positionsService->getAll($attributes);

        return view('hrms.positions.list', compact('results'));
    }

    public function add()
    {
        $departments = $this->positionsService->getDepartments();

        return view('hrms.positions.add', compact('departments'));
    }

    public function create(Request $request)
    {
        $attributes = $request->all();
        $result = $this->positionsService->create($attributes);

        \Session::flash('flash_message', 'Position successfully Created!');
        return redirect('positions');
    }

    public function edit($id)
    {
        $departments = $this->positionsService->getDepartments();
        $result = $this->positionsService->getById($id);

        return view('hrms.positions.edit', compact('result', 'departments'));
    }

    public function update(Request $request, $id){
        $attributes = array_except($request->all(), ['_token']);
        $result = $this->positionsService->update($attributes, $id);

        \Session::flash('flash_message', 'Position successfully Updated!');
        return redirect('positions');
    }

    public function delete($id)
    {
        $this->positionsService->delete($id);

        \Session::flash('flash_message', 'Position successfully Deleted!');
        return redirect('positions');
    }
}
