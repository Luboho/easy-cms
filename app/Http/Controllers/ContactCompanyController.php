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
           
        auth()->user()->company()->create($this->validateRequest());        // fnc.above

        session()->flash('success', 'Dáta boli vložené.');

        return redirect('/');
    }

    public function edit(User $user, Company $company)
    {
        return view('contact.company.edit', compact('company', 'user'));
    }
    
    public function update(User $user, Company $company)
    {
        
        auth()->user()->company()->update($this->validateRequest());        // fnc.above

        session()->flash('success', 'Údaje boli upravené.');
        return redirect("/contact");
    }

    private function validateRequest()
    {
        return request()->validate([
            'mobile' => '',
            'phone' => '',
            'facebook' => '',
            'openHours' => '',
            'name' => '',
            'street' => '',
            'city' => '', 
        ]);
    }
}
