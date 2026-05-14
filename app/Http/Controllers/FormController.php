<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create()
    {
        return view('youth-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|min:3',
            'email' => 'required|email',
            'age' => 'required|numeric|min:15',
            'activity' => 'required',
            'message' => 'required|min:5',
        ]);

        return back()->with('success', 'Registration Successful!');
    }
}
