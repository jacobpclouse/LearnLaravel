<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\YourEntry; // Add this import statement

use Inertia\Inertia; // Add this import

class DashboardController extends Controller
{
    //
    public function index()
    {
        $entries = YourEntry::latest()->get();
        
        return Inertia::render('Dashboard', [
            'entries' => $entries
        ]);
    }
}
