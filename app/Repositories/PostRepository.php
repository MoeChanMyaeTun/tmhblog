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
        if ($request['title'] != null) {
            $data = Post::where('title', 'LIKE', '%' . $request->title . '%')->paginate(6);
        } else {
            $data = Post::orderBy('id', 'desc')->paginate(6);
        }
        $categories = Category::with('post')->get();
        $latest = Post::orderBy('id', 'DESC')->limit(5)->get();
        return compact(
            'data',
            'categories',
            'latest'
        );
    }
    public function store(PostStoreRequest $request)
    {
        $data = new Post();
        $data->title = $request['title'];
        $data->description = $request['description'];
        $data->category_id = $request['category-names'];
        $data->user_id = auth()->user()->id;
        $this->storeImage($data);
        $data->save();

        return compact(
            'data',
        );
    }
    public function storeImage($data)
    {
        if (request()->file('image') != null) {

            $file = request()->file('image');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = ('img');
            $data->image = "$save_path/$file_name";
            $file->move($save_path, $save_path . "/$file_name");
        }
    }

    public function show($id)
    {
        $data = Post::find($id);

        return compact(
            'data'
        );
    }

    public function update(PostStoreRequest $request, $id)
    {
        $data = post::find($id);
        $data->title = $request['title'];
        $data->description = $request['description'];
        $data->category_id = $request['category-names'];
        $data->user_id = auth()->user()->id;
        $this->storeImage($data);
        $data->update();
        $category = Category::find($id);

        return compact(
            'data',
            'category'
        );
    }

    public function delete($id)
    {
        $data = post::find($id);
        $data->delete();

        return compact(
            'data'
        );
    }
}
