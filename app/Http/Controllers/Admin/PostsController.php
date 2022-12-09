<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Repositories\Admin\PostRepository;

class PostsController extends Controller
{
    protected $PostRepository;

    public function __construct(PostRepository $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    public function index(Request $request)
    {
        $posts = $this->PostRepository->index($request);

        return view('admin.post.index', $posts);
    }

    public function edit(Post $post)
    {
        $posts = $this->PostRepository->edit($post);

        return view('admin.post.edit', $posts);
    }

    public function update(PostStoreRequest $request, Post $post, Category $category)
    {
        $posts = $this->PostRepository->update($request, $post, $category);

        return redirect()->route('admin.post.index');
    }

    public function destroy(Post $post)
    {
        $posts = $this->PostRepository->destroy($post);

        return redirect()->route('admin.post.index', $posts);
    }

}
