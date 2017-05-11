<?php

namespace App\Http\Controllers;

//use App\User;
//use App\Mail\Welcome;
use App\Http\Requests\RegistrationForm;

//use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //
    public function create() {

       return view('registration.create');
    }

    public function store(RegistrationForm $form) {
      // Validate the forms

      // store was getting chunky, this was moved to RegistrationRequest
      // as a result need to pass RegistrationRequest as argument after including
      // $this->validate(request(), [
      //   'name' => 'required',
      //   'email' => 'required|email',
      //   'password' => 'required|confirmed'
      // ]);


      // Create and save User
      // this way didn't work, only manually created user (using tinker)
      // worked because there was a manual bcrypt, Auth is automatcially comparing bcrypted
      // values on attempt()
      // $user = User::create(request(['name','email','password']));

      //so instead
      // $user = User::create([             //LOGIC MOVED TO REGISTRATION REQUEST
      //   'name' => request('name'),
      //   'email' => request('email'),
      //   'password' => bcrypt(request('password'))
      // ]);
      //
      // //Sign them in (Depends on if confirmation e-mail etc.)
      // //\Auth::login();
      // auth()->login($user);
      //
      // \Mail::to($user)->send(new Welcome($user));

      //replace everything above with
      $form->persist();

      //Redirect to home page
      //return view('posts.index');
      return redirect()->home();        //to use this, must specify home route (See web.php)
    }
}
