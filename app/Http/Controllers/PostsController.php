<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Logo;
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


        auth()->user()->post()->create($this->validateRequest());       // priv. fnc. below

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

        if(!empty(request('image'))){
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
            'attention_message' => 'string',
            'caption' => 'string',
            'image' => ['image', 'mimes:png,jpeg,jpg', 'max:1999'],
            'text' => 'string|max:500',
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
