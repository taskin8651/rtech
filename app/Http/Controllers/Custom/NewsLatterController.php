<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newslater;

class NewsLatterController extends Controller
{
    public function store(Request $request)
    {
        // Validate email
        $request->validate([
            'email' => 'required|email|unique:newslaters,mail',
        ]);

        // Save email
        Newslater::create([
            'mail' => $request->email,
        ]);

        // Return message
        return back()->with('success', 'Thank you for subscribing!');
    }
}
