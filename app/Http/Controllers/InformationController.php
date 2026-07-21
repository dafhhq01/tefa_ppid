<?php

namespace App\Http\Controllers;

use App\Models\information;
use App\Models\information_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $information = information::latest()->get();

        return view('information.index', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index_public()
    {
        $information = information::latest()->get();

        return view('/', compact('information'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'nullable',
            'file' => 'nullable|file|max:5000|required_if:is_external_link,false',
            'external_url' => 'nullable|url|required_if:is_external_link,true',
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

        $validated['slug'] = Str::slug($request->title);

        Information::create($validated);

        return redirect()->route('information-categories.index')->with('success', 'Information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(information $information)
    {
        $categories = information_category::all();

        return view('informations.edit', compact('information','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, information $information)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'nullable',
            'file' => 'nullable|file|max:5000',
            'is_external_link' => 'required',
        ]);

        if($request->hasFile('file')){
            if($information->file){
                Storage::disk('public')->delete('documents/'.$information->file);
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
            $validated['file'] = $information->file;
        }

        $validated['slug'] = str()->slug($request->title);

        $information->update($validated);

        return redirect()->route('informations.index')->with('success','Information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(information $information)
    {
        $information->delete();

        return redirect()->route('information.index')->with('success', 'Information deleted successfully.');
    }
}
