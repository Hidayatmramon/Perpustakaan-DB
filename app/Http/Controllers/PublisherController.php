<?php

namespace App\Http\Controllers;

use App\Models\publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::latest()->paginate(5);
  
        return view('publishers.index',compact('publishers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'penerbit' => 'required',
        ]);
  
        Publisher::create($request->all());
   
        return redirect()->route('publishers.index')
                        ->with('success','Berhasil Menyimpan !');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(publisher $publisher)
    {
        return view('publishers.edit',compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, publisher $publisher)
    {
        $request->validate([
            'penerbit' => 'required',
        ]);
  
        $publisher->update($request->all());
  
        return redirect()->route('publishers.index')
                        ->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(publisher $publisher)
    {
        $publisher->delete();
  
        return redirect()->route('publishers.index')
                        ->with('success','Berhasil Hapus !');
    }
}
