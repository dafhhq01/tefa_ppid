<?php

namespace App\Http\Controllers;

use App\Models\Regulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regulations = Regulation::orderBy('order')->get();

        return view('index', compact('regulations'));
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
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'file' => 'nullable|file|max:5000|required_if:is_external_link,false',
            'external_url' => 'nullable|url|required_if:is_external_link,true',
            'type' => 'required',
            'order' => 'required'
        ]);

        if($request->hasFile('file') && !$request->is_external_link){
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();

            $file->storeAs(
                'documents',
                $filename,
                'public'
            );

            $validated['file'] = $filename;
        }
        $validated['slug'] = str()->slug($request->title);

        Regulation::create($validated);

        return redirect()->route('regulation.index')->with('success', 'Information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Regulation $regulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regulation $regulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regulation $regulation)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'file' => 'nullable|file|max:5000|required_if:is_external_link,false',
            'external_url' => 'nullable|url|required_if:is_external_link,true',
            'type' => 'required',
            'order' => 'required'
        ]);

        if($request->hasFile('file')){
            if($regulation->file){
                Storage::disk('public')->delete('documents/'.$regulation->file);
            }

            $file = $request->file('file');

            $filename = time().'_'.$file->getClientOriginalName();

            $file->storeAs(
                'documents',
                $filename,
                'public'
            );

            $validated['file'] = $filename;

        } else {
            $validated['file'] = $regulation->file;
        }

        $validated['slug'] = str()->slug($request->title);

        $regulation->update($validated);

        return redirect()->route('regulation.index')->with('success','regulation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regulation $regulation)
    {
        $regulation->delete();

        return redirect()->route('regulation.index')->with('success', 'regulation deleted successfully.');
    }
}
