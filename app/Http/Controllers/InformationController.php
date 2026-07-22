<?php

namespace App\Http\Controllers;

use App\Models\information;
use App\Models\InformationCategory;
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

        if($request->hasFile('file') && !$request->boolean('is_external_link')){
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();

            $file->storeAs(
                'documents',
                $filename,
                'public'
            );
        }

        $slug = Str::slug($request->title);

        information::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $slug,
            'file' => $validated['file'] ?? null,
            'external_url' => $request->external_url,
            'is_external_link' => $request->is_external_link,
            'button_label' => $request->button_label,
        ]);

        return redirect()->route('information.index')->with('success', 'Information created successfully.');
    }

    public function create()
    {
        return view('information.create');
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
        $categories = InformationCategory::all();

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
            'external_url' => 'nullable',
            'button_label' => 'nullable',
        ]);

        if($request->hasFile('file') && !$request->boolean('is_external_link')){
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

        $slug = str()->slug($request->title);

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
