<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;

class PostRepository
{
    public function index(Request $request)
    {
        $posts = post::when(request('title'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('title') . '%');
        })->orderBy('id', 'desc')->paginate(6);
        $categories = Category::with('post')->get();
        $latest = Post::orderBy('id', 'DESC')->limit(5)->get();

        return compact(
            'posts',
            'categories',
            'latest'
        );
    }

    public function create()
    {
        $categories = Category::all();

        return compact(
            'categories',
        );
    }

    public function store(PostStoreRequest $request)
    {
        if (request()->file('image') != null) {

            $file = request()->file('image');
            $fileName = $file->getClientOriginalName();
            $file = $request->file('image')->storeAs('public/images/post', "$fileName");
          
        }

        $posts = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->name,
            'user_id' => auth()->id(),
            'image' => $fileName,
        ]);

        return compact(
            'posts',
        );
    }

    public function show(Post $post)
    {
        $data = Post::find($post);
        $posts = post::when(request('title'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('title') . '%');
        })->where('category_id', $data->category_id)->limit(3)->get();
        $categories = Category::with('post')->get();
        $latest = Post::orderBy('id', 'DESC')->limit(5)->get();

        return compact(
            'data',
            'latest',
            'categories',
            'posts'
        );
    }

}
