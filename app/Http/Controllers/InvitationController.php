<?php

namespace App\Http\Controllers;

use App\User;
use App\Invitation;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() 
    {
        return view('invitation.create');
    }

    public function store(User $user, Invitation $invitation)
    {
            $data = request()->validate([
                'email' => 'email|required',
                ]);
                
            $existingUser = User::where('email', $data['email'])->first();

            if(empty($existingUser->email)){
                $invitation = new Invitation();
                $invitation->email = $data['email'];
                $invitation->verification_code = sha1(time());
                $invitation->save();

                Mail::to($invitation['email'])->send(new InvitationMail(['email' => $invitation->email, 'verification_code' => $invitation->verification_code]));

                session()->flash('success', 'Pozývací email bol odoslaný.');
                return redirect()->route('profiles.index');
            } else {
                session()->flash('denied', 'Zvolená emailová adresa už patrí registrovanému užívateľovi.');
                return redirect()->route('profiles.index');
            }
        

    }

}
