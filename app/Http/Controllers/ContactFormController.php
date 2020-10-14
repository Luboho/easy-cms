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
    
    // public function index(User $user, Company $company)
    // {
    //    $companyData = Company::all();

    //     return view('contact.index', compact('companyData', 'user'));  
    // }

    public function create()
    {
        return view('feedback.create');   
    }

    public function store()
    {
        $data = request()->validate([
            'contact-us-name' => 'required|string',
            'contact-us-email' => 'required|email',
            'contact-us-message' => 'required|string',
        ]);
        Mail::to(env('MAIL_USERNAME'))->send(new ContactFormMail($data));

        session()->flash('success', 'Vaša správa bola odoslaná.');

        return redirect()->back();
    }

    public function edit(User $user, Company $company)
    {

        return view('feedback.edit', compact('company'));
    }
}
