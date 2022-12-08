<?php

namespace App\Repositories;


use App\Models\Category;
use App\Http\Requests\CategoriesRequest;

class CategoriesRepository
{
    public function index()
    {
        $data = Category::all();
        return compact(
            'data',
        );
    }
    public function create()
    {
        $data = Category::all();
        return compact(
            'data',
        );
    }
    public function store(CategoriesRequest $request)
    {
        $data = new Category();
        $data->name = $request['name'];
        $data->save();

        return compact(
            'data',
        );
    }
}
