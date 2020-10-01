<?php

namespace App\Http\Controllers;

use App\Logo;
use App\Post;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Post $post, Logo $logo)
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // $data = request()->validate([
        //     'attention_message' => '',
        //     'caption' => '',
        //     'image' => ['image', 'mimes:png,jpeg,jpg', 'max:1999'],
        //     'text' => '',
        // ]);

        // $imagePath = request('image')->store('uploads', 'public');
        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(250, 200);
        // $image->save();

        if(isset(request()->image) || isset(request()->caption) || isset(request()->text) ) {
            auth()->user()->post()->create($this->validateRequest());       // priv. fnc. below
        } else {
            session()->flash('denied', "Vyplňte aspoň jeden údaj.");
            return back();
        }


        return redirect('/');
    }

    public function show(Post $post, User $user)
    {
        return view('posts.show', compact('post', 'user'));
    }

    public function edit(Post $post, User $user)
    {
        return view('posts.edit', compact('post', 'user'));
    }

    public function update(User $user, Post $post)
    {
        $this->authorize('update', $post);
        if(!empty($post->image)){
            if(file_exists(storage_path('app/public/'.$post->image))){
                unlink(storage_path('app/public/'.$post->image));
            }
        }

        $post->update($this->validateRequest());            // priv. fnc. below

        return redirect('/');
    }

    public function destroy(Post $post, User $user)
    {
        $this->authorize('delete', $post);

        if(empty($post->image)){
            $post->delete();
        }elseif(!file_exists(storage_path('app/public/'.$post->image))){
            $post->delete();
        }elseif(!empty($post->image) && file_exists(storage_path('app/public/'.$post->image))){
            unlink(storage_path('app/public/'.$post->image));
            $post->delete();
        }    

        session()->flash('success', 'Príspevok bol zmazaný.');

        return redirect('/');
    }

    private function validateRequest()
    {
        $data = request()->validate([
            'attention_message' => 'string|max:15000',
            'caption' => 'nullable|string',
            'image' => ['image', 'mimes:png,jpeg,jpg', 'max:1999'],
            'text' => 'nullable|string|max:15000',
        ]);

        if (request('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(450, 350);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        return $validatedArray = array_merge(
            $data,
            $imageArray ?? []
        );
    }

    
}
