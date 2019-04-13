<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $courses = \App\Course::all();

        return response()->json([
            'message' => 'Successfully retrieved all courses!',
            'courses'=>$courses
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
          'courseID'=>'required',
          'courseYear' => 'required',
          'coordinatorID' => 'required',
        ]);

        $project = Course::create([
          'courseID'=>$validatedData['courseID'],
          'courseYear' => $validatedData['courseYear'],
          'coordinatorID' => $validatedData['coordinatorID'],
        ]);

        return response()->json(['message'=>'Course created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return $course->toJson();
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
        $course = Course::find($id);
        $course->courseID = $request->get('courseID');
        $course->courseYear = $request->get('courseYear');
        $course->coordinatorID = $request->get('coordinatorID');
        $course->save();

        return response()->json(['message'=>'Successfully updated course']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return response()->json(['message'=>'Successfully deleted course']);
    }

    public function getCourseCoordinator($id)
    {        
        $coordinator = Course::find($id)->coordinator;
        return response()->json(['message'=>'Successfully obtained coordinator','Coordinator'=> $coordinator]);        
    }

    public function getCourseGroups($id)
    {        
        $groups = Course::find($id)->groups;
        return response()->json(['message'=>'Successfully obtained groups','groups'=> $groups]);        
    }

    public function getCourseStudents($id)
    {        
        $students = Course::find($id)->students;
        return response()->json(['message'=>'Successfully obtained students','students'=> $students]);        
    }
}
