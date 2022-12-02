<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    protected $PostRepository;

    public function __construct(PostRepository $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    public function index()
    {
        $data = $this->PostRepository->index();
        return view('post.index',$data);
    }

    public function create()
    {
        $data = $this->PostRepository->create();

    }
}
