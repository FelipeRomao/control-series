<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeginController extends Controller
{
    public function index()
    {
        return view('begin.index');
    }

    public function signIn(Request $request)
    {
        $isAuthenticated = Auth::attempt($request->only(['email', 'password']));

        if(!$isAuthenticated) {
            return redirect()->back()->withErrors('Incorrect username and/or password');
        }

        return redirect()->route('series-list');

    }
}
