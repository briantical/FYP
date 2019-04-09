<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panelist;

class PanelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $panelists = Panelist::all();

        return response()->json([
            'message' => 'Successfully retrieved all Panelists!',
            'Panelists'=>$panelists
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
           'panelistID'=> 'required', 
           'deptID'=> 'required',                             
        ]);

        $user = User::find($request->get($validatedData['userID']));

        $panelsit = Panelist::create([
          'name' => $user->name,
           'email'=> $user->email, 
           'password' => $user->password, 
           'active'=> $user->active, 
           'activation_token'=> $user->activation_token, 
           'avatar'=> $user->avatar, 
           'userID'=> $user->userID, 
           'lectureID'=> $validatedData['lectureID'], 
           'lectureDescription'=> $validatedData['lectureDescription'], 
           'panelistID'=> $validatedData['panelistID'], 
           'deptID'=> $validatedData['deptID'], 
           'isCoordinator'=> false,
           'isSupervisor'=> false,
           'isPanelist'=> true,
           'remember_token' =>$user->remember_token,
           'email_verified_at' => $user->email_verified_at
        ]);

        return response()->json(['message'=>'Panelist created!','panelist'=>$panelist]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $panelist = Panelist::find($id);
        return $panelist->toJson();
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

        $panelist = Panelist::find($id);
        $user = User::find($request->get($validatedData['userID']));
           $panelist->name => $user->name,
           $panelist->email=> $user->email, 
           $panelist->password => $user->password, 
           $panelist->active=> $user->active, 
           $panelist->activation_token=> $user->activation_token, 
           $panelist->avatar=> $user->avatar, 
           $panelist->userID=> $user->userID, 
           $panelist->lectureID=> $validatedData['lectureID'], 
           $panelist->lectureDescription=> $validatedData['lectureDescription'], 
           $panelist->panelistID=> $id, 
           $panelist->deptID=> $validatedData['deptID'], 
           $panelist->isCoordinator=> false,
           $panelist->isSupervisor=> false,
           $panelist->isPanelist=> true,
           $panelist->remember_token =>$user->remember_token,
           $panelist->email_verified_at=> $user->email_verified_at
        $panelist->save();

        return response()->json(['message'=>'Successfully updated Panelist']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $panelist = Panelist::find($id);
        $panelsit->delete();

        return response()->json(['message'=>'Successfully deleted Panelist']);
    }

    public function getAllProjects($id)
    {
        $projects = Panelist::find($id)->projects();
        
        return response()->json(['message'=>'Successfully retrieved Projects','Projects'=> $projects]);
    }

}
