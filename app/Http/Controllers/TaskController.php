<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $tasks = \App\Task::all();

        return response()->json([
            'message' => 'Successfully retrieved all tasks!',
            'tasks'=>$tasks
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
          'taskID'=>'required',
          'taskName' => 'required',
          'taskDescription' => 'required',
          'supervisorID' => 'required',
          'taskStartDate' => 'required',
          'taskEndDate' => 'required',
          'isComplete' => 'required',
          'isStarted' => 'required',
        ]);

        $task = Task::create([
          'taskID'=>$validatedData['taskID'],
          'taskName' => $validatedData['taskName'],
          'taskDescription' => $validatedData['taskDescription'],
          'supervisorID'=>$validatedData['supervisorID'],
          'taskStartDate' => $validatedData['taskStartDate'],
          'taskEndDate' => $validatedData['taskEndDate'],
          'isComplete' => $validatedData['isComplete'],
          'isStarted' => $validatedData['isStarted'],
        ]);

        return response()->json(['message'=>'Task created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return $task->toJson();
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
        $task = Task::find($id);
        $task->taskID = $request->get('taskID');
        $task->taskName = $request->get('taskName');
        $task->taskDescription = $request->get('taskDescription');
        $task->supervisorID = $request->get('supervisorID');
        $task->taskStartDate = $request->get('taskStartDate');
        $task->taskEndDate = $request->get('taskEndDate');
        $task->isComplete = $request->get('isComplete');
        $task->isStarted = $request->get('isStarted');
        $task->save();

        return response()->json(['message'=>'Successfully updated task']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json(['message'=>'Successfully deleted task']);
    }

    public function getAllProjectswithTasks($id)
    {
        $projects = Task::find($id)->projects();        

        return response()->json(['message'=>'Successfully deleted projects', 'projects'=>$projects]);
    }

    public function getTaskAssignee($id)
    {
        $supervisor = Task::find($id)->supervisor();        

        return response()->json(['message'=>'Successfully deleted supervisors', 'supervisor'=>$supervisor]);
    }
}
