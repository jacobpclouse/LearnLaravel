<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YourEntry; // Add this import statement

use Inertia\Inertia; // Add this import

class YourEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the entries in the database
        $entries = YourEntry::latest()->get();
        
        return Inertia::render('Entries/Index', [
            'entries' => $entries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Entries/CreateEntry');
    }

    /**
     * Store a newly created resource in storage.
     */
     // In app/Http/Controllers/YourEntryController.php
     public function store(Request $request)
     {
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'nullable|string',
             // Other validation rules
         ]);
         
         $entry = YourEntry::create($validated); // this is saying that it can't find the controller?
         
         // Redirect back with a success message
         return redirect()->route('dashboard')->with('message', 'Entry created successfully!');
         
         // Or redirect to a different page
         // return redirect()->route('entries.index')->with('message', 'Entry created successfully!');
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
    // public function edit(string $id)
    public function edit(YourEntry $entry)
    {
        // edit specific entries
        return Inertia::render('Entries/EditEntry', [
            'entry' => $entry
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request, YourEntry $entry)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Other validation rules
        ]);
        
        $entry->update($validated);
        
        return redirect()->route('entries.index')->with('message', 'Entry updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    public function destroy(YourEntry $entry)
    {
        $entry->delete();
        
        return redirect()->route('entries.index')->with('message', 'Entry deleted successfully!');
    }
}
