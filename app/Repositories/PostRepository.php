<?php

namespace App\Repositories;

use App\Models\Post;
use Dflydev\DotAccessData\Data;

class PostRepository{
    public function index(){
        $data = Post::all();
        return compact(
            'data',
        );
    }
    public function create(){
        $data = Post::all();
        return compact(
            'data',
        );
    }
}
