<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Comments\CommentsRequest;
use App\Models\Comment;

trait commentTrait{

    public function commentStore(CommentsRequest $request)
    {
     $requestArray = $request->all() + ['user_id' => auth()->user()->id] ;
    //   dd($requestArray);
     Comment::create($requestArray);
     return redirect()->route('videos.index');

    }

    public function commentUpdate($id , CommentsRequest $request)
    {
     $row = Comment::findOrFail($id);
     $row->update($request->all());
     return redirect()->route('videos.index');

    }


    public function commentDelete($id)
    {
     $row = Comment::findOrFail($id);
     $row->delete();
     return redirect()->route('videos.index');

    }

}
