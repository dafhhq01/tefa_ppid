<?php

namespace App\Http\Controllers;

use App\Models\information_category;
use Illuminate\Http\Request;

class InformationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = information_category::latest()->get();

        return view('information-categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:information_categories,name',
        ]);

        information_category::create($validated);

        return redirect()->with('success', 'Information category created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, information_category $information_category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:information_categories,name,' . $$information_category->id,
        ]);

        $information_category->update($validated);

        return redirect()->route('information-categories.index')->with('success', 'Information category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(information_category $information_category)
    {
        $information_category->delete();

        return redirect()->route('information-categories.index')->with('success', 'Information category deleted successfully.');
    }
}
