<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alacarte;
use App\User;
use Intervention\Image\Facades\Image;


class AlacarteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Alacarte $alacarte)
    {
        $alacartes = Alacarte::paginate(6);

        return view('alacarte.index', compact('alacartes'));
    }

    public function create()
    {
        return view('alacarte.create');
    }

    public function store()
    {
        auth()->user()->alacarte()->create($this->validateRequest());

        session()->flash('success', 'Príspevok bol úspešne pridaný.');

        return redirect('alacarte');
    }

    public function show(Alacarte $alacarte)
    {
        return view('alacarte.show', compact('alacarte'));
    }

    public function edit(Alacarte $alacarte)
    {
        return view('alacarte.edit', compact('alacarte'));
    }

    public function update(Alacarte $alacarte)
    {
        $this->authorize('update', $alacarte);
        
        $data = request()->validate([
            'caption' => 'nullable|string|max:100',
            'image' => ['image', 'mimes:png,jpeg,jpg', 'max:1999']
        ]);

       if (request('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 800);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        if(!empty(request('image'))){
            if(file_exists(storage_path('app/public/'.$alacarte->image))){
                unlink(storage_path('app/public/'.$alacarte->image));
            }
        }

        $alacarte->update(array_merge($this->validateRequest()));

        session()->flash('success', 'Príspevok bol upravený.');

        return redirect('/alacarte');
    }

    public function destroy(Alacarte $alacarte)
    {
        $this->authorize('delete', $alacarte);
        
        if(file_exists(storage_path('app/public/'.$alacarte->image))){
            unlink(storage_path('app/public/'.$alacarte->image));
            $alacarte->delete();
        } elseif (!file_exists(storage_path('app/public/'.$alacarte->image))){
            $alacarte->delete();
        }

        session()->flash('success', 'Príspevok bol zmazaný.');

        return redirect('/alacarte');  
    }

    private function validateRequest()
    {
        $data = request()->validate([
            'caption' => 'nullable|string|max:100',
            'image' => ['image', 'mimes:png,jpeg,jpg', 'max:1999']
        ]);

        if (request('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 800);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        return $validatedArray = array_merge(
            $data,
            $imageArray ?? []
        );
    }
}
