<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = \App\Department::all();

        return response()->json([
            'message' => 'Successfully retrieved all departments!',
            'departments'=>$departments
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'deptID'=>'required',
          'deptName' => 'required',
          'deptDescription' => 'required',
        ]);

        $project = Department::create([
          'deptID'=>$validatedData['deptID'],
          'deptName' => $validatedData['deptName'],
          'deptDescription' => $validatedData['deptDescription'],
        ]);

        return response()->json(['message'=>'Department created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        return $department->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->deptID = $request->get('deptID');
        $department->deptName = $request->get('deptName');
        $department->deptDescription = $request->get('deptDescription');
        $department->save();

        return response()->json(['message'=>'Successfully Updated Department']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();

        return response()->json(['message'=>'Successfully Deleted department']);
    }

    public function getDepartmentSupervisors($id)
    {        
        $supervisors = Department::find($id)->supervisors;
        return response()->json(['message'=>'Successfully obtained supervisors','supervisors'=> $supervisors]);        
    }

    public function getDepartmentCoordinators($id)
    {        
        $coordinators = Department::find($id)->coordinators;
        return response()->json(['message'=>'Successfully obtained coordinators','coordinators'=> $coordinators]);        
    }

    public function getDepartmentPanelists($id)
    {        
        $panelists = Department::find($id)->panelists;
        return response()->json(['message'=>'Successfully obtained panelists','Panelists'=> $panelists]);        
    }
}
