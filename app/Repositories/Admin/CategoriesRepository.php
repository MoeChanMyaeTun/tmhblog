<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Http\Requests\CategoriesRequest;

class CategoriesRepository
{
    public function index()
    {
        $categories = Category::all();

        return compact(
            'categories',
        );
    }

    public function store(CategoriesRequest $request)
    {
        $categories = new Category();
        $categories->name = $request['name'];
        $categories->save();

        return compact(
            'categories',
        );
    }
}
