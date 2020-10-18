<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Tag;
use App\Http\Requests\BackEnd\Tags\TagsRequest;


class TagController extends BackEnd
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }// end of __constract child function


    public function store(TagsRequest $request)
    {
        $this->model->create($request->all());

        return redirect(route('tags.index'));
    } // end of store function



    public function update($id , TagsRequest $request)
    {
        $row = $this->model->findOrFail($id);

        $row->update($request->all());

        return redirect(route('tags.index'));

    }// end of update function
}
