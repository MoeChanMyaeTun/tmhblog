<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Category;

class CategoryPostRepository
{
    public function show($id)
    {
        $data = category::find($id);
        //  $posts = Post::where('category_id',$data->id)->paginate(6);
         $posts=post::when(request('title'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('title') . '%');
        })->where('category_id',$data->id)->orderBy('id', 'desc')->paginate(6);
        $latest = Post::orderBy('id', 'DESC')->limit(5)->get();
        $categories =Category::with('post')->get();
        return compact(
            'data',
            'posts',
            'latest',
            'categories'
        );
    }

}
