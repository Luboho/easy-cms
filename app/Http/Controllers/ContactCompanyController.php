<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Middleware\Role;
use Illuminate\Http\Request;
use App\Company;
use App\Post;
use App\User;

class ContactCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Company $company)
    {
        $company = Company::all();

        if ( $company->isEmpty() && (Gate::allows('isHeadAdmin'))) {
            return view('contact.company.create');
        }
        else
        {
            session()->flash('denied', 'Nemáte prístup, alebo firemné údaje už boli vytvorené. ');
            return redirect('/contact');
        }

    }

    public function store(User $user)
    {
        if(isset(request()->mobile) || isset(request()->phone) || isset(request()->facebook) ||
            isset(request()->openHours) || isset(request()->name) || isset(request()->street) ||
                isset(request()->city) ) {
            auth()->user()->company()->create($this->validateRequest());       // priv. fnc. below
        } else {
            session()->flash('denied', "Vyplňte aspoň jeden údaj.");
            return back();
        }

        return redirect('/');
        
        // auth()->user()->company()->create($this->validateRequest());        // fnc.above

        // session()->flash('success', 'Dáta boli vložené.');

        // return redirect('/');
    }

    public function edit(User $user, Company $company)
    {
        return view('contact.company.edit', compact('company', 'user'));
    }
    
    public function update(User $user, Company $company)
    {
        
        if(!empty(request()->mobile) || !empty(request()->phone) || !empty(request()->facebook) ||
            !empty(request()->openHours) || !empty(request()->name) || !empty(request()->street) ||
                !empty(request()->city) ) {
                    auth()->user()->company()->update($this->validateRequest());        // fnc.above
        } else {
            session()->flash('denied', "Vyplňte aspoň jeden údaj.");
            return back();
        }

        return redirect('/');


        // auth()->user()->company()->update($this->validateRequest());        // fnc.above

        // session()->flash('success', 'Údaje boli upravené.');
        // return redirect("/contact");
    }

    private function validateRequest()
    {
        return request()->validate([
            'mobile' => 'nullable|string|max:15',
            'phone' => 'nullable|string|max:15',
            'facebook' => 'nullable|string|max:30',
            'openHours' => 'nullable|string|max:15000',
            'name' => 'nullable|string|max:50',
            'street' => 'nullable|string|max:50',
            'city' => 'nullable|string|max:50', 
        ]);
    }
}
