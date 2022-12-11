<?php

namespace App\Repositories\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;

class PostRepository
{
    public function index(Request $request)
    {
        $posts = Post::when(request('title'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('title') . '%');
        })->orderBy('id', 'desc')->paginate(6);

        return compact(
            'posts',
        );
    }

   

    public function edit(Post $post)
    {
        $data = Post::findOrfail($post->id);
        $categories = Category::all();

        return compact(
            'data',
            'categories'
        );

    }

    public function update(Request $request, Post $post)
    {
        if (request()->file('image') != null) {

            $file = request()->file('image');
            $fileName = $file->getClientOriginalName();
            $file = $request->file('image')->storeAs('public/images/post', "$fileName");
          
        }
        
        $posts = Post::update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->name,
            'user_id' => auth()->id(),
            'image' => $fileName,
        ]);


        return compact(
            'posts',
            'category'
        );
    }

    public function destroy(Post $post)
    {
        // $posts = post::find($post);

        $post->delete();

        return compact(
            'post'
        );
    }
}
