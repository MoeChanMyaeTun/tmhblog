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
        $data = Post::find($id);
        $categories = Category::find($id);
        return view('post.show', compact('categories', 'data'));
    }

    public function edit($id)
    {
        $data = Post::find($id);
        $categories = Category::all();
        return view('post.edit', compact('data', 'categories'));
    }

    public function update(PostStoreRequest $request, $id)
    {
        $data = $this->PostRepository->update($request, $id);
        return redirect()->route('post.index');
    }

    public function delete($id)
    {
        $data = $this->PostRepository->delete($id);
        return redirect()->route('post.index', $data);
    }
}
