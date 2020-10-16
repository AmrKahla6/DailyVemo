<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Category;
use App\Http\Requests\BackEnd\Categories\CategoriesRequest;

class CategoryController extends BackEnd
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }// end of __constract child function


    public function store(CategoriesRequest $request)
    {
        $this->model->create($request->all());

        return redirect(route('categories.index'));
    } // end of store function



    public function update($id , CategoriesRequest $request)
    {
        $row = $this->model->findOrFail($id);

        $row->update($request->all());

        return redirect(route('categories.index'));

    }// end of update function


}// end of controller

