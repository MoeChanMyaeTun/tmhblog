<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\PostsRepository;
use App\Http\Requests\PostStoreRequest;

class PostsController extends Controller
{
    protected $PostsRepository;

    public function __construct(PostsRepository $PostsRepository)
    {
        $this->PostsRepository = $PostsRepository;
    }

    public function index(Request $request)
    {
        $data = $this->PostsRepository->index($request);

        return view('admin.post.index', $data);
    }
    public function edit($id)
    {
        $data = Post::find($id);
        $categories = Category::all();

        return view('admin.post.edit', compact('data', 'categories'));
    }

    public function update(PostStoreRequest $request, $id)
    {
        $data = $this->PostsRepository->update($request, $id);

        return redirect()->route('admin.post.index');
    }

    public function delete($id)
    {
        $data = $this->PostsRepository->delete($id);

        return redirect()->route('admin.post.index', $data);
    }


}
