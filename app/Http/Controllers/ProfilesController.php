<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

        $user->delete();

        session()->flash('success', 'Užívateľ bol zmazaný.');
        return redirect('/profiles');
    }
}
