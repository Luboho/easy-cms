<?php

namespace App\Http\Controllers;

use App\Logo;
use App\Post;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Helper;
use PostValidator;


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
        if(isset(request()->image) || isset(request()->caption) || isset(request()->text) ) {
            auth()->user()->post()->create(PostValidator::validateRequest());       // PostValidator class
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

        if(!empty(request('image'))){
            if(file_exists(storage_path('app/public/'.$post->image))){
                unlink(storage_path('app/public/'.$post->image));
            }
        }

        $post->update(PostValidator::validateRequest());       // PostValidator class


        session()->flash('success', 'Príspevok bol úspešne upravený.');
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
    
}
