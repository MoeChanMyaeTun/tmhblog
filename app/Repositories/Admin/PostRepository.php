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

    public function storeImage($posts)
    {
        if (request()->file('image') != null) {

            $file = request()->file('image');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = ('img');
            $posts->image = "$save_path/$file_name";
            $file->move($save_path, $save_path . "/$file_name");
        }
    }

    public function edit(Post $post)
    {
        $data = Post::find($post);
        $categories = Category::all();

        return compact(
            'posts',
            'categories'
        );

    }

    public function update(PostStoreRequest $request, Post $post, Category $category)
    {
        $posts = post::find($post);
        $post->title = $request['title'];
        $post->description = $request['description'];
        $post->category_id = $request['category-names'];
        $this->storeImage($post);
        $post->update();
        $category = Category::find($category);

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
