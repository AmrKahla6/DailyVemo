<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Video;
use App\Models\Category;
use App\Models\Skill;
use App\Http\Requests\BackEnd\Videos\VideosRequest;
use Illuminate\Support\Facades\DB;

class VideoController  extends BackEnd

{
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }// end of __constract child function

   protected function with()
   {
       return ['cat' , 'user'];
   }

   protected function append()
   {
       return [
           'categories' => Category::get(),
           'skills'     => Skill::get(),
       ];
   }
    public function store(VideosRequest $request)
    {
        $requestArray = $request->except('skills') + ['user_id' => auth()->user()->id];

        // return $requestArray;

        $row  = $this->model->create($requestArray);

      if(isset($request['skills']) && !empty($request['skills']))
      {
        // return $request;

              $row->skills()->sync($request['skills']);
      }

        return redirect(route('videos.index'));
    }// end of store function


    public function update($id , VideosRequest $request)
    {
        $requestArray = $request->except('skills');

        // dd($requestArray);

        $row = $this->model->findOrFail($id);

        $row->update($requestArray);

        if(isset($request['skills']) && !empty($request['skills']))
        {
        //  dd($request['skills']);

          $row->skills()->sync($request['skills']);
        }

        return redirect(route('videos.index'));

    }// end of update function


}// end of controller
