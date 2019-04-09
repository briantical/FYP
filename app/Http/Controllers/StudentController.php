<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return response()->json([
            'message' => 'Successfully retrieved all Students!',
            'Students'=>$students
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
           'userID' =>'required',
           'studentNumber'=> 'required', 
           'registrationNumber'=> 'required', 
           'courseID'=> 'required',
           'groupID'=> 'required',                            
        ]);

        $user = User::find($request->get($validatedData['userID']));

        $student = Student::create([
           'name' => $user->name,
           'email'=> $user->email, 
           'password' => $user->password, 
           'active'=> $user->active, 
           'activation_token'=> $user->activation_token, 
           'avatar'=> $user->avatar, 
           'userID'=> $user->userID, 
           'studentNumber'=> $validatedData['studentNumber'], 
           'registrationNumber'=> $validatedData['registrationNumber'], 
           'courseID'=> $validatedData['courseID'], 
           'groupID'=> $validatedData['groupID'],            
           'remember_token' =>$user->remember_token,
           'email_verified_at' => $user->email_verified_at
        ]);

        return response()->json(['message'=>'Student created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return $student->toJson();
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
        
        $validatedData = $request->validate([
           'userID' =>'required',
           'studentNumber'=> 'required', 
           'registrationNumber'=> 'required', 
           'courseID'=> 'required',
           'groupID'=> 'required',                    
        ]);

        $student = Student::find($id);
        $user = User::find($request->get($validatedData['userID']));
           $student->name => $user->name,
           $student->email=> $user->email, 
           $student->password => $user->password, 
           $student->active=> $user->active, 
           $student->activation_token=> $user->activation_token, 
           $student->avatar=> $user->avatar, 
           $student->userID=> $user->userID, 
           $student->studentNumber=>$id, 
           $student->registrationNumber=> $validatedData['registrationNumber',           
           $student->courseID=> $validatedData['courseID'],
           $student->groupID=> $validatedData['groupID'],            
           $student->remember_token =>$user->remember_token,
           $student->email_verified_at=> $user->email_verified_at
        $student->save();

        return response()->json(['message'=>'Successfully updated student']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return response()->json(['message'=>'Successfully deleted Student']);
    }

    public function getStudentCourse($id)
    {
        $course = Student::find($id)->course();
        
        return response()->json(['message'=>'Successfully retrieved Student course', 'Course'=>$course]);
    }

    public function getStudentGroup($id)
    {
        $group = Student::find($id)->course();
        
        return response()->json(['message'=>'Successfully retrieved Student group', 'Group'=>$group]);
    }
}
