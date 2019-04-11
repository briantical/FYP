<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = \App\Assignment::all();

        return response()->json([
            'message' => 'Successfully retrieved all assignments!',
            'assignments'=>$assignments
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
          'supervisorID' => 'required',                
        ]);

        $panel = Assignment::create([
          'taskID'=>$validatedData['taskID'],
          'supervisorID' => $validatedData['supervisorID'],          
        ]);

        return response()->json(['message'=>'Assignment created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::find($id);
        return $assignment->toJson();
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
        $assignment = Assignment::find($id);
        $assignment->taskID = $request->get('taskID');
        $assignment->supervisorID = $request->get('supervisorID');        
        $assignment->save();

        return response()->json(['message'=>'Successfully updated supervisor']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Panel::find($id);
        $assignment->delete();

        return response()->json(['message'=>'Successfully deleted assignment']);
    }
}
