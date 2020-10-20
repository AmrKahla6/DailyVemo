<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Video;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Comment;
use App\Http\Requests\BackEnd\Videos\StoreRequest;
use App\Http\Requests\BackEnd\Videos\UpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VideoController  extends BackEnd

{
    use commentTrait;

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
       $array = [
           'categories'     => Category::get(),
           'skills'         => Skill::get(),
           'tags'           => Tag::get(),
           'selectedSkills' => [],
           'selectedTags'   => [],
           'comments'       => [],
       ];

       if (request()->route()->parameter('video'))
       {
           $array['selectedSkills'] = $this->model->find(request()->route()->parameter('video'))
           ->skills()->get()->pluck('id')->toArray();

           $array['selectedTags'] = $this->model->find(request()->route()->parameter('video'))
           ->tags()->get()->pluck('id')->toArray();

           $array['comments'] = $this->model->find(request()->route()->parameter('video'))
           ->comments();
       }

       return $array ;
   }// end of append function


    public function store(StoreRequest $request)
    {
        // dd($request->all());
        $file = $request->file('image');
        $fileName = time().Str::random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads') , $fileName);
        // dd($fileName);
        $requestArray = ['user_id' => auth()->user()->id , 'image' => $fileName] + $request->except('skills' , 'tags');
        //   dd($requestArray);
        $row  = $this->model->create($requestArray);
        $this->syncSkillsTags($row , $requestArray , $request);
        return redirect(route('videos.index'));
    }// end of store function


    public function update($id , UpdateRequest $request)
    {
        $requestArray = $request->except(['skills' ,'tags']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random('10').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads') , $fileName);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        // dd($requestArray);
        $row = $this->model->findOrFail($id);
        $row->update($requestArray);
        $this->syncSkillsTags($row , $requestArray , $request);
        return redirect(route('videos.index'));

    }// end of update function

    protected function syncSkillsTags($row , $requestArray , $request)
    {
        if(isset($request['skills']) && !empty($request['skills']))
        {
          // return $request;

                $row->skills()->sync($request['skills']);
        }

        if(isset($request['tags']) && !empty($request['tags']))
        {
          //    return $request;
                $row->tags()->sync($request['tags']);

              //   return $request;
        }
    }


}// end of controller
