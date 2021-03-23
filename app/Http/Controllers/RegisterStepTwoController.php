<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterStepTwoController extends Controller
{
    public function create()
    {
        return view('auth.register-step2');
    }

    public function store(Request $request)
    {
        auth()->user()->update([
            'adresse' => $request->adresse,
            'bio' => $request->bio,
        ]);
        return redirect()->route('dashboard');
    }
}
