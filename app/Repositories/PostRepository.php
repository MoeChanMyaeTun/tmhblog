<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;

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
            // $file_name = $file->getClientOriginalName();
            $file_name = $file->getClientOriginalName();
            $file = $request->image->storeAs('public/images/post', "$file_name");
        }

        $posts = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->name,
            'user_id' => auth()->id(),
            'image' => $file,
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
