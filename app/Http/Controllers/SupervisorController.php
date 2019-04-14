<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supervisor;
use App\User;
use Avatar;
use Storage;

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
           'lecturerID'=> 'required', 
           'lecturerDescription'=> 'required', 
           'supervisorID'=> 'required', 
           'deptID'=> 'required',                               
        ]);

        $user = User::find($validatedData['userID']);
        //$user = Supervisor::find($id)->user();
        if($user !== null){
          $supervisor = Supervisor::create([
            'name' => $user->name,
             'email'=> $user->email, 
             'password' => $user->password, 
             'active'=> $user->active, 
             'activation_token'=> $user->activation_token, 
             'avatar'=> $user->avatar, 
             'userID'=> $user->id, 
             'lecturerID'=> $validatedData['lecturerID'], 
             'lecturerDescription'=> $validatedData['lecturerDescription'], 
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
        else{
          return response()->json(['message'=>'Supervisor not created!']);
        }

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
           'lecturerID'=> 'required', 
           'lecturerDescription'=> 'required',            
           'deptID'=> 'required',                             
        ]);

        $supervisor = Supervisor::find($id);
        $user = User::find($validatedData['userID']);
        //$user = Supervisor::find($id)->user();
           $supervisor->name = $user->name;
           $supervisor->email= $user->email;
           $supervisor->password = $user->password;
           $supervisor->active= $user->active;
           $supervisor->activation_token= $user->activation_token;
           $supervisor->avatar= $user->avatar;
           $supervisor->userID= $user->id;
           $supervisor->lecturerID= $validatedData['lecturerID'];
           $supervisor->lecturerDescription= $validatedData['lecturerDescription'];
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
        $projects = Supervisor::find($id)->projects;
        
        return response()->json(['message'=>'Successfully retrieved Projects','projects'=> $projects]);
    }

    public function getAllTasks($id)
    {
        $tasks = Supervisor::find($id)->tasks;
        
        return response()->json(['message'=>'Successfully retrieved Tasks','tasks'=> $tasks]);
    }
}
