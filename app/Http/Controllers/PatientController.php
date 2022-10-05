<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $patients= \App\Models\Patient::orderBy('id')->paginate(10);
        return view('patient.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\Models\Patient::create($request->post());

        return redirect()->route('paciente.index')->with('success','Se ha creado un nuevo paciente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient=  \App\Models\Patient::find($id);
        return view('patient.edit',compact('patient'));
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
        $input= $request->post();
        $patient=  \App\Models\Patient::find($id);
  
        $patient->first_name=$input['first_name'];
        $patient->last_name=$input['last_name'];
        $patient->direction=$input['direction'];
        $patient->save();

        //la manera corta
       // $patient->fill($input)->save();

       return redirect()->route('paciente.index')->with('success','Se ha editado el paciente');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient=  \App\Models\Patient::find($id);
        $patient->delete();

        return redirect()->route('paciente.index')->with('success','Se ha borrado el paciente');
    }
}
