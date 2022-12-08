<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{
    protected $PostRepository;

    public function __construct(PostRepository $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    public function index(Request $request)
    {
        $data = $this->PostRepository->index($request);
        return view('post.index', $data);
    }

    public function create()
    {
        $data = Post::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'data'));
    }
    public function store(PostStoreRequest $request)
    {
        $data = $this->PostRepository->store($request);
        return redirect()->route('post.index');
    }
    public function show($id)
    {
        $data = $this->PostRepository->show($id);
        return view('post.show',$data);
    }


}
