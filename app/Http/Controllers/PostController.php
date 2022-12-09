<?php

namespace App\Http\Controllers;

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
        $posts = $this->PostRepository->index($request);

        return view('post.index', $posts);
    }

    public function create()
    {
        $posts = $this->PostRepository->create();

        return view('post.create', $posts);
    }

    public function store(PostStoreRequest $request)
    {
        $posts = $this->PostRepository->store($request);

        return redirect()->route('post.index');
    }

    public function show($post)
    {
        $posts = $this->PostRepository->show($post);

        return view('post.show', $posts);
    }

}
