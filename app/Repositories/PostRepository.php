<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;

class PostRepository{
    public function index(Request $request){
        $search = $request->input('title');
        $data = Post::where('title', 'LIKE', '%' . $search . '%')->orderBy('created_at','desc')->paginate(6);
        return compact(
            'data',
        );
    }
    public function store(PostStoreRequest $request){
        $data = new Post();
        $data->title=$request['title'];
        $data->description = $request['description'];
        $data->category_id = $request['category-names'];
        $this->storeImage($data);
        $data->save();

        return compact(
            'data',
        );
    }
    public function storeImage($data)
    {
        if(request()->file('image')!=null){

            $file = request()->file('image');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = ('img');
           $data->image= "$save_path/$file_name";
            $file->move($save_path, $save_path . "/$file_name");
        }
    }
}
