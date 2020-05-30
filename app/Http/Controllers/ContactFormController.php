<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\Company;
use App\User;

class ContactFormController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only(['edit', 'store']);
    }
    
    public function index(User $user, Company $company)
    {
       $companyData = Company::all();

        return view('contact.index', compact('companyData', 'user'));  
    }

    public function create()
    {
        return view('contact.create');   
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('test@test.com')->send(new ContactFormMail($data));

        session()->flash('success', 'Vaša správa bola odoslaná.');

        return redirect()->back();
    }

    public function edit(User $user, Company $company)
    {

        return view('contact.edit', compact('company'));
    }
}
