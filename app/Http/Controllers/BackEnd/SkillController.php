<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Skill;
use App\Http\Requests\BackEnd\Skills\SkillsRequest;


class SkillController extends BackEnd
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }// end of __constract child function


    public function store(SkillsRequest $request)
    {
        $this->model->create($request->all());

        return redirect(route('skills.index'));
    } // end of store function



    public function update($id , SkillsRequest $request)
    {
        $row = $this->model->findOrFail($id);

        $row->update($request->all());

        return redirect(route('skills.index'));

    }// end of update function
}
