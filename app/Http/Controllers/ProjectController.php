<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $projects = \App\Project::all();

        return response()->json([
            'message' => 'Successfully retrieved all projects!',
            'projects'=>$projects
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
          'projectID'=>'required',
          'projectName' => 'required',
          'projectDescription' => 'required',
          'groupID' => 'required',
          'supervisorID' => 'required',
          'projectStartDate' => 'required',
          'projectEndDate' => 'required',
          'isComplete' => 'required',
          'isStarted' => 'required',
        ]);

        $project = Project::create([
          'projectID'=>$validatedData['projectID'],
          'projectName' => $validatedData['projectName'],
          'projectDescription' => $validatedData['projectDescription'],
          'groupID' => $validatedData['groupID'],
          'supervisorID'=>$validatedData['supervisorID'],
          'projectStartDate' => $validatedData['projectStartDate'],
          'projectEndDate' => $validatedData['projectEndDate'],
          'isComplete' => $validatedData['isComplete'],
          'isStarted' => $validatedData['isStarted'],
        ]);

        return response()->json(['message'=>'Project created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return $project->toJson();
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
        $project = Project::find($id);
        $project->projectID = $request->get('projectID');
        $project->projectName = $request->get('projectName');
        $project->projectDescription = $request->get('projectDescription');
        $project->groupID = $request->get('groupID');
        $project->supervisorID = $request->get('supervisorID');
        $project->projectStartDate = $request->get('projectStartDate');
        $project->projectEndDate = $request->get('projectEndDate');
        $project->isComplete = $request->get('isComplete');
        $project->isStarted = $request->get('isStarted');
        $project->save();

        return response()->json(['message'=>'Successfully updated project']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        return response()->json(['message'=>'Successfully deleted Project']);
    }

    public function getProjectTasks($id)
    {
        $tasks = Project::find($id)->tasks();
        
        return response()->json(['message'=>'Successfully retrieved tasks', 'tasks' => $tasks]);
    }

    public function getProjectPanelists($id)
    {
        $panelists = Project::find($id)->panelists();
        
        return response()->json(['message'=>'Successfully retrieved panelists', 'panelists' => $panelists]);
    }

    public function getProjectGroup($id)
    {
        $group = Project::find($id)->group();
        
        return response()->json(['message'=>'Successfully retrieved group', 'group' => $group]);
    }

    public function getProjectSupervisor($id)
    {
        $supervisor = Project::find($id)->supervisor();
        
        return response()->json(['message'=>'Successfully retrieved supervisor', 'supervisor' => $supervisor]);
    }
}
