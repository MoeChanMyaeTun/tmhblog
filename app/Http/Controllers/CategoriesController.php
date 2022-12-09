<?php

namespace App\Http\Controllers;

use App\Repositories\CategoriesRepository;

class CategoriesController extends Controller
{
    protected $CategoriesRepository;

    public function __construct(CategoriesRepository $CategoriesRepository)
    {
        $this->CategoryPostRepository = $CategoriesRepository;
    }

    public function show($id)
    {
        $categories = $this->CategoryPostRepository->show($id);

        return view('category.index', $categories);
    }
}
