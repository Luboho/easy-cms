<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Logo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class LogosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('logos.create');
    }

    public function store(Logo $logo)
    {
        auth()->user()->logo()->create($this->validateRequest());  // fnc.below

        return redirect('/');
    }

    public function edit(Logo $logo)
    {
        return view('logos.edit', compact('logo'));
    }

    public function update(User $user, Logo $logo)
    {
        $logos = Logo::first()->get();          // File handling. If request 'image' than unlink .
        foreach($logos as $logoName){
           $fileForDelete = $logoName->image;
        }   // Background
        if(!empty(request('background'))){
            if(file_exists(storage_path('app/public/'.$logo->image))){
                unlink(storage_path('app/public/'.$logo->image));
            } 
        }   // Image
        if(!empty(request('image'))){
            if(file_exists(storage_path('app/public/'.$logo->image))){
                unlink(storage_path('app/public/'.$logo->image));
            } 
        }
        
        $logo->update($this->validateRequest());
        
        return redirect('/');
    }

    private function validateRequest()
    {
         $data = request()->validate([
            'image' => ['image', 'mimes:png,jpeg,jpg', 'max:1999'],
            'text' => 'nullable|string|max:15000'
        ]);

        if (request('image')){
            $imagePath = request('image')->store('pics', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
            
            $imageArray = ['image' => $imagePath];
        }
        return $validatedArray = array_merge(
            $data,
            $imageArray ?? []
        );
    }
    
}
