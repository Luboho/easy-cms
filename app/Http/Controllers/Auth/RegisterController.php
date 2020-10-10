<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Invitation;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\WelcomeMailController;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {   // Show Registration form only for verified user, 
        $requestedEmail = request('email');
        
        $verifiedUser = Invitation::where(['email' => $requestedEmail ])->first('is_verified');

        if(isset($requestedEmail) && $verifiedUser['is_verified'] === 1) {

            return view('auth.register');

        } else {
            return redirect('/')->with(session()->flash('denied', 'Registrácia je len pre pozvaných.'));
        }
    }

        /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        
        return redirect('/')->with(session()->flash('success', 'Vaša registrácia prebehla úspešne.'));

    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $this->redirectTo = '/profiles';

        return $userData = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        
    }

    public function verifyUser()
    {   
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        // If request code exists in sent invitation $table return instance of it.
        $sentInviteVerification = Invitation::where(['verification_code' => $verification_code])->first();

        if($sentInviteVerification !== null && $sentInviteVerification['is_verified'] === 0) {
            $sentInviteVerification->is_verified = 1;
            $sentInviteVerification->save();

            return redirect()->route('register', ['email' => $sentInviteVerification->email])->with(session()->flash('success', 'Zaregistrujte sa prosím.' ));

        } elseif($sentInviteVerification['is_verified'] === 1) {
            
            return redirect('/')->with(session()->flash('denied', 'Neplatné overenie. Pravdepodobne overovací kód už bol raz použitý.'));
        }
        
        return redirect('/')->with(session()->flash('denied', 'Registrácia je len pre pozvaných.'));
    }
}
