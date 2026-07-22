<?php

namespace App\Http\Controllers;

use App\Models\InformationCategory;
use Illuminate\Http\Request;

class InformationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = InformationCategory::latest()->get();

        return view('index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:information_categories,slug',
        ]);

        InformationCategory::create($validated);

        return redirect()->route('information-categories.index')->with('success', 'Information category created successfully.');
    }

    public function edit(InformationCategory $informationCategory)
    {
        return view('information-category.edit', compact('informationCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformationCategory $informationCategory)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:information_categories,slug,' . $informationCategory->id,
        ]);

        $informationCategory->update($validated);

        return redirect()->route('information-categories.index')->with('success', 'Information category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InformationCategory $informationCategory)
    {
        $informationCategory->delete();

        return redirect()->route('information-categories.index')->with('success', 'Information category deleted successfully.');
    }
}
