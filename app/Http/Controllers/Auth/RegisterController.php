<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    protected function register(Request $request)
    {
        $input = $request->all();  // holt alle requests
        $validator = $this->validator($input);  //überprüfen mit validatoren

        if ($validator->passes()) {
            $data = $this->create($input)->toArray();
            $data['activation_code'] = str_random(25);  // erstellt random token

            $user = User::find($data['id']);
            $user->activation_code = $data['activation_code'];
            $user->save();

            Mail::send('emails.confirmation', $data, function ($message) use ($data) {  // sendet mail
                $message->to($data['email']);    // empfänger email (this -> user)
                $message->subject('Bestätigungs Email');  //headline
            });
            return redirect()->route('login')->with('success', 'Check inbox'); // zurückleiten auf route und Meldung ausgeben,

        }
        return redirect()->route('login')->with('error', $validator->errors());
    }


    /**
     * @param $activation_code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmation($activation_code)
    {
        $user = User::where('activation_code', $activation_code)->first();  // suche den User mit den token

        if(!is_null($user)){
            $user->is_active = 1;   // überschreibe is_active
            $user->activation_code = '';   // überschreibe token
            $user->save();
            return redirect()->route('login')->with('success', 'Account verifiziert!');
        }
        return redirect()->route('login')->with('error', 'Etwas lief schief..');

    }
}
