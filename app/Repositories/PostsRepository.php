<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;

class PostsRepository
{
    public function index(Request $request)
    {
        $data = post::when(request('title'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('title') . '%');
        })->orderBy('id', 'desc')->paginate(6);

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

    public function update(PostStoreRequest $request, $id)
    {
        $data = post::find($id);
        $data->title = $request['title'];
        $data->description = $request['description'];
        $data->category_id = $request['category-names'];
        $this->storeImage($data);
        $data->update();
        $category = Category::find($id);

        return compact(
            'data',
            'category'
        );
    }

    public function destroy($id)
    {
        $data = post::find($id);
        $data->delete();

        return compact(
            'data'
        );
    }
}
