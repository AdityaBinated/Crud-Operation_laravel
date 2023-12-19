<?php

namespace App\Http\Controllers;
use App\Models\Crud;

use Illuminate\Http\Request;

// class Crud{
//     public function save(){
        
//     }
// }
class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cruds = Crud::all();  
  
        return view('index', compact('cruds')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        $request->validate([  
            'first_name'=>'required',  
            'last_name'=>'required',  
            'gender'=>'required',  
            'qualifications'=>'required'  
        ]);  
  

       
        $crud = new Crud;
        $crud->first_name =  $request->get('first_name');
        $crud->last_name = $request->get('last_name');
        $crud->qualifications = $request->get('qualifications');
        $crud->gender = $request->get('gender');
        $crud->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $crud= Crud::find($id);  
        return view('edit', compact('crud'));  

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        
        //
        $request->validate([  
            'first_name'=>'required',  
            'last_name'=>'required',  
            'gender'=>'required',  
            'qualifications'=>'required'  
        ]);  
  
        $crud= Crud::find($id);   
        $crud->first_name =  $request->get('first_name');  
        $crud->last_name = $request->get('last_name');  
        $crud->qualifications = $request->get('qualifications');  
        $crud->gender = $request->get('gender');  
        $crud->save();  

        
        return view('edit', compact('crud'));  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $crud=Crud::find($id);  
        $crud->delete();  
    }
}
