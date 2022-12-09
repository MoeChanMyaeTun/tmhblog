<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Repositories\Admin\CategoriesRepository;

class CategoryController extends Controller
{
    protected $CategoriesRepository;

    public function __construct(CategoriesRepository $CategoriesRepository)
    {
        $this->CategoriesRepository = $CategoriesRepository;
    }

    public function index()
    {
        $categories = $this->CategoriesRepository->index();

        return view('admin.category.index', $categories);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoriesRequest $request)
    {
        $categories = $this->CategoriesRepository->store($request);

        return redirect()->route('admin.category.index');
    }
}
