<?php

namespace App\Http\Controllers;

use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentGroups = StudentGroup::latest()->paginate(5);
    
        return view('studentGroups.index',compact('studentGroups'))
            ->with('i', (request()->input('page', 1) - 1) * 5); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('studentGroups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required',
        ]);
    
        StudentGroup::create($request->all());
     
        return redirect()->route('studentGroups.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentGroup $studentGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentGroup $studentGroup)
    {
        return view('studentGroups.edit',compact('studentGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentGroup $studentGroup)
    {
        $request->validate([
            'rombel' => 'required',
        ]);
            
        $studentGroup->update($request->all());
    
        return redirect()->route('studentGroups.index')
                        ->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentGroup $studentGroup)
    {
        $studentGroup->delete();
     
        return redirect()->route('studentGroups.index')
                        ->with('success','Berhasil Hapus !');
    }
}
