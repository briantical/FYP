<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panel;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $panels = \App\Panel::all();

        return response()->json([
            'message' => 'Successfully retrieved all panels!',
            'panels'=>$panels
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
          'panelistID' => 'required',                
        ]);

        $panel = Panel::create([
          'projectID'=>$validatedData['projectID'],
          'panelistID' => $validatedData['panelistID'],          
        ]);

        return response()->json(['message'=>'Panel created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $panel = Panel::find($id);
        return $panel->toJson();
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
        $panel = Panel::find($id);
        $panel->projectID = $request->get('projectID');
        $panel->panelistID = $request->get('panelistID');        
        $panel->save();

        return response()->json(['message'=>'Successfully updated Panel']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $panel = Panel::find($id);
        $panel->delete();

        return response()->json(['message'=>'Successfully deleted panel']);
    }
}
