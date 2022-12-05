<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;
use App\Repositories\CategoriesRepository;

class CategoriesController extends Controller
{
    protected $CategoriesRepository;

    public function __construct(CategoriesRepository $CategoriesRepository)
    {
        $this->CategoriesRepository = $CategoriesRepository;
    }

    public function index()
    {
        $data = $this->CategoriesRepository->index();
        return view('admin.category.index',$data);
    }

    public function create()
    {
        return view ('admin.category.create');
    }

    public function store(CategoriesRequest $request)
    {
        $data = $this->CategoriesRepository->store($request);
        return redirect()->route('admin.category.index');
    }
}
