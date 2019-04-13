<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = \App\Group::all();

        return response()->json([
            'message' => 'Successfully retrieved all groups!',
            'groups'=>$groups
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
          'groupID'=>'required',
          'groupName' => 'required',
          'courseID' => 'required',
          'createdOn' => 'required'
        ]);

        $project = Course::create([
          'groupID'=>$validatedData['groupID'],
          'groupName' => $validatedData['groupName'],
          'courseID' => $validatedData['courseID'],
          'createdOn' => $validatedData['createdOn']
        ]);

        return response()->json(['message'=>'Group created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        return $group->toJson();
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
        $group = Group::find($id);
        $group->groupID = $request->get('groupID');
        $group->groupName = $request->get('groupName');
        $group->courseID = $request->get('courseID');
        $group->createdOn = $request->get('createdOn');
        $group->save();

        return response()->json(['message'=>'Successfully updated group']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        return response()->json(['message'=>'Successfully deleted group']);
    }

    public function getGroupStudents($id)
    {        
        $students = Group::find($id)->students;
        return response()->json(['message'=>'Successfully obtained students','Students'=> $students]);        
    }

    public function getGroupProject($id)
    {        
        $project = Group::find($id)->project;
        return response()->json(['message'=>'Successfully obtained group project','Project'=> $project]);        
    }

    public function getGroupCourse($id)
    {        
        $course = Group::find($id)->course;
        return response()->json(['message'=>'Successfully obtained group course','Course'=> $course]);        
    }
}
