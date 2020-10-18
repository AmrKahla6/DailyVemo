<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Page;
use App\Http\Requests\BackEnd\Pages\PagesRequest;

class PageController  extends BackEnd
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }// end of __constract child function


    public function store(PagesRequest $request)
    {
        $this->model->create($request->all());

        return redirect(route('pages.index'));
    } // end of store function



    public function update($id , PagesRequest $request)
    {
        $row = $this->model->findOrFail($id);

        $row->update($request->all());

        return redirect(route('pages.index'));

    }// end of update function


}// end of controller

