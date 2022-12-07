<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryPostRepository;



class CategoryPostController extends Controller
{
    protected $CategoryPostRepository;

    public function __construct(CategoryPostRepository $CategoryPostRepository)
    {
        $this->CategoryPostRepository = $CategoryPostRepository;
    }

    public function show($id)
    {
        $data = $this->CategoryPostRepository->show($id);
        return view('category.index', $data);
    }
}
