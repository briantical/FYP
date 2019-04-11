<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supervisor;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisors = Supervisor::all();

        return response()->json([
            'message' => 'Successfully retrieved all Supervisors!',
            'Supervisors'=>$supervisors
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
           'userID'=> 'required'         ,
           'lectureID'=> 'required', 
           'lectureDescription'=> 'required', 
           'supervisorID'=> 'required', 
           'deptID'=> 'required',                               
        ]);

        $user = User::find($request->get($validatedData['userID']));

        $supervisor = Supervisor::create([
          'name' => $user->name,
           'email'=> $user->email, 
           'password' => $user->password, 
           'active'=> $user->active, 
           'activation_token'=> $user->activation_token, 
           'avatar'=> $user->avatar, 
           'userID'=> $user->userID, 
           'lectureID'=> $validatedData['lectureID'], 
           'lectureDescription'=> $validatedData['lectureDescription'], 
           'supervisorID'=> $validatedData['supervisorID'], 
           'deptID'=> $validatedData['deptID'], 
           'isCoordinator'=> false,
           'isSupervisor'=> true,
           'isPanelist'=> false,
           'remember_token' =>$user->remember_token,
           'email_verified_at' => $user->email_verified_at
        ]);

        return response()->json(['message'=>'Supervisor created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supervisor = Supervisor::find($id);
        return $supervisor->toJson();
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
           'userID'=> 'required'         ,
           'lectureID'=> 'required', 
           'lectureDescription'=> 'required',            
           'deptID'=> 'required',                             
        ]);

        $supervisor = Supervisor::find($id);
        $user = User::find($request->get($validatedData['userID']));
           $supervisor->name = $user->name;
           $supervisor->email= $user->email;
           $supervisor->password = $user->password;
           $supervisor->active= $user->active;
           $supervisor->activation_token= $user->activation_token;
           $supervisor->avatar= $user->avatar;
           $supervisor->userID= $user->userID;
           $supervisor->lectureID= $validatedData['lectureID'];
           $supervisor->lectureDescription= $validatedData['lectureDescription'];
           $supervisor->supervisorID=$id; 
           $supervisor->deptID= $validatedData['deptID']; 
           $supervisor->isCoordinator= false;
           $supervisor->isSupervisor= true;
           $supervisor->isPanelist= false;
           $supervisor->remember_token = $user->remember_token;
           $supervisor->email_verified_at =$user->email_verified_at;
        $supervisor->save();

        return response()->json(['message'=>'Successfully updated Supervisor']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $supervisor = Supervisor::find($id);
        $supervisor->delete();

        return response()->json(['message'=>'Successfully deleted Supervisor']);
    }

    public function getAllProjects($id)
    {
        $projects = Supervisor::find($id)->projects();
        
        return response()->json(['message'=>'Successfully retrieved Projects','Projects'=> $projects]);
    }

    public function getAllTasks($id)
    {
        $tasks = Supervisor::find($id)->tasks();
        
        return response()->json(['message'=>'Successfully retrieved Tasks','Tasks'=> $tasks]);
    }
}
