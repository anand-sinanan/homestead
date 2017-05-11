<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('guest', ['except' => 'destroy']);
      //in posts it looked like
      //$this->middleware('guest')->except(['destroy']);
    }

    public function create()
    {
      return view('sessions.create');
    }

    public function store()
    {
      //Attempt to authenticate user (I believe auth handles function we used in Registration Controller auth()->login())
      if(! auth()->attempt(request(['email', 'password']))) {
        //If not redirect back (show message?)
        return back()->withErrors([
          'message' => 'Please check your credentials.'
        ]);
      }

      //Redirect to home page (posts)
      return redirect()->home();
    }
    public function destroy()
    {
      auth()->logout();
      return redirect()->home();
    }
}
