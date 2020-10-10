<?php

namespace App\Http\Controllers;

use App\User;
use App\Invitation;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $users = User::all();

        return view('profiles.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        if($user !== null){
            $userInvitation = Invitation::where('email', $user->email)->delete();
            $user->delete();

            session()->flash('success', 'Užívateľ bol zmazaný.');
            return redirect('/profiles');
        } else {
            session()->flash('denied', 'Hoplá. Užívateľ nebol odstránený. Skúste to prosím znova.');
            return redirect('/profiles');
        }
    }
}
