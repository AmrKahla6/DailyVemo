<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Tag;

class HomeController extends BackEnd
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }// end of __constract child function

    public function index()
    {
        $videos       = Video::count();
        $skills       = Skill::count();
        $tags         = Tag::count();
        $comments     = Comment::with('user' , 'video')->paginate(10);
        $comm_count   = Comment::count();

        return view('back-end.home' , compact('videos' , 'skills' , 'tags' , 'comments' , 'comm_count'));
    }

}
