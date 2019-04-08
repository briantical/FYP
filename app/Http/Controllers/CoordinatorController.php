<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coordinator;
use App\User;

class CoordinatorController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinators = \App\Coordinator::all();

        return response()->json([
            'message' => 'Successfully retrieved all Coordinators!',
            'Coordinators'=>$coordinators
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
           'coordinatorID'=> 'required', 
           'deptID'=> 'required', 
           'isCoordinator'=> 'required',
           'isSupervisor'=> 'required',
           'isPanelist'=> 'required',                    
        ]);

        $user = User::find($request->get($validatedData['userID']));

        $project = Course::create([
          'name' => $user->name,
           'email'=> $user->email, 
           'password' => $user->password, 
           'active'=> $user->active, 
           'activation_token'=> $user->activation_token, 
           'avatar'=> $user->avatar, 
           'userID'=> $user->userID, 
           'lectureID'=> $validatedData['lectureID'], 
           'lectureDescription'=> $validatedData['lectureDescription'], 
           'coordinatorID'=> $validatedData['coordinatorID'], 
           'deptID'=> $validatedData['deptID'], 
           'isCoordinator'=> $validatedData['isCoordinator'],
           'isSupervisor'=> $validatedData['isSupervisor'],
           'isPanelist'=> $validatedData['isPanelist'],
           'remember_token' =>$user->remember_token,
           'email_verified_at' => $user->email_verified_at
        ]);

        return response()->json(['message'=>'Coordinator created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $coordinator = Coordinator::find($id);
        return $coordinator->toJson();
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
           'isCoordinator'=> 'required',
           'isSupervisor'=> 'required',
           'isPanelist'=> 'required',                    
        ]);

        $coordinator = Coordinator::find($id);
        $user = User::find($request->get('userID'));
           $coordinator->name => $user->name,
           $coordinator->email=> $user->email, 
           $coordinator->password => $user->password, 
           $coordinator->active=> $user->active, 
           $coordinator->activation_token=> $user->activation_token, 
           $coordinator->avatar=> $user->avatar, 
           $coordinator->userID=> $user->userID, 
           $coordinator->lectureID=> $validatedData['lectureID'], 
           $coordinator->lectureDescription=> $validatedData['lectureDescription'], 
           $coordinator->coordinatorID=> $id, 
           $coordinator->deptID=> $validatedData['deptID'], 
           $coordinator->isCoordinator=> $validatedData['isCoordinator'],
           $coordinator->isSupervisor=> $validatedData['isSupervisor'],
           $coordinator->isPanelist=> $validatedData['isPanelist'],
           $coordinator->remember_token =>$user->remember_token,
           $coordinator->email_verified_at=> $user->email_verified_at
        $coordinator->save();

        return response()->json(['message'=>'Successfully updated coordinator']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coordinator = Coordinator::find($id);
        $coordinator->delete();

        return response()->json(['message'=>'Successfully deleted Coordinator']);
    }
}
