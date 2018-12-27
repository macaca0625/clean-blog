<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // try to authanticate user

        if(! auth()->attempt(request(['email', 'password'])) ) {
            return back()->withErrors([
                'message' => 'Try again.',
            ]);
        }

        return redirect('/');
    }

    public function destroy()
    {

        auth()->logout();

        return redirect('/');
    }
}
