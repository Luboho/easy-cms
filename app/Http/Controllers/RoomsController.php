<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(User $user, Room $room)
    {
        $rooms = Room::orderBy('created_at', 'desc')->get();

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Room $room)
    {
        $data = request()->validate([
            'caption' => 'nullable|string|max:15000',
            'image' => ['image','required', 'mimes:png,jpeg,jpg', 'max:1999'],
            'text' => 'nullable|string|max:15000',    
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(450, 350);
        $image->save();

        auth()->user()->room()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'text' => $data['text'],
        ]);

        session()->flash('success', 'Príspevok bol úspešne pridaný.');

        return redirect('rooms');
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(User $user, Room $room)
    {
        $this->authorize('update', $room);
        $data = request()->validate([
            'caption' => 'string|max:15000',
            'image' => ['image', 'mimes:png,jpeg,jpg', 'max:1999'],
            'text' => 'string|max:15000',
        ]);

        if (request('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(450, 350);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        if(!empty(request('image'))){
            if(file_exists(storage_path('app/public/'.$room->image))){
                unlink(storage_path('app/public/'.$room->image));
            }
        }

        $room->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        session()->flash('success', 'Príspevok bol úspešne upravený.');
        return redirect('/rooms');
    }

    public function destroy(Room $room)
    {
        $this->authorize('delete', $room);

        if(file_exists(storage_path('app/public/'.$room->image))){
            unlink(storage_path('app/public/'.$room->image));
            $room->delete();
        } elseif (!file_exists(storage_path('app/public/'.$room->image))){
            $room->delete();
        }

        session()->flash('success', 'Príspevok bol zmazaný.');

        return redirect('/rooms');
    }

}