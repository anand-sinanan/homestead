<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;          //we want everyone to be able to register
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required|confirmed'
        ];
    }

    /**
     * Execute controller logic here when controller starts looking messy.
     *
     * @return void
     */
    public function persist()
    {

       //Logic from controller moved here, however since this IS a request,
       //change helper request()
      $user = User::create(
        [
        'name' => $this->name,
        'email' => $this->email,
        'password' => bcrypt($this->password)
        ]
    );

      //Sign them in (Depends on if confirmation e-mail etc.)
      //\Auth::login();
      auth()->login($user);

      \Mail::to($user)->send(new Welcome($user));
    }

}
