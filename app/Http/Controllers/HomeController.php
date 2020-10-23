<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Comment;
use App\Http\Requests\FrontEnd\Comments\CommentsRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'index',
            'commentUpdate',
            'commentStore',
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::orderby('id' , 'desc')->paginate(30);
        return view('home' , compact('videos'));
    }// End of index Function

    public function category($id)
    {
        $cat = Category::findOrFail($id);
        $videos = Video::where('cat_id' , $id)->orderby('id' , 'desc')->paginate(30);
        return view('front-end.categories.index' , compact('videos' , 'cat'));
    }// End of category Function


    public function video($id)
    {
        $video = Video::with('skills' , 'tags' , 'cat' , 'user' , 'comments.user')->findOrFail($id);
        return view('front-end.videos.index' , compact('video'));
    }// End of video Function

    public function skills($id)
    {
        $skill = Skill::findOrFail($id);
        $videos = Video::whereHas('skills' , function($query) use($id){
            $query->where('skill_id' , $id);
        })->orderby('id' , 'desc')->paginate(30);
        return view('front-end.skills.index' , compact('videos' , 'skill'));
    }// End of skills Function

    public function tags($id)
    {
        $tag = Tag::findOrFail($id);
        $videos = Video::whereHas('tags' , function($query) use($id){
            $query->where('tag_id' , $id);
        })->orderby('id' , 'desc')->paginate(30);
        return view('front-end.tags.index' , compact('videos' , 'tag'));
    }// End of Tags Function

    public function commentUpdate($id , CommentsRequest $request)
    {
        $comment = Comment::findOrFail($id);

        if(($comment->user_id == auth()->user()->id) || auth()->user()->group == 'admin')
        {
            $comment->update(['comment' =>$request->comment]);
        }

         return redirect()->route('frontend-video' , ['id' => $comment->video_id , '#comments']);

    }// End of commentUpdate Function

    public function commentStore($id , CommentsRequest $request)
    {
        $video = Video::findOrFail($id);

        Comment::create([
            'user_id'  => auth()->user()->id,
            'video_id' => $video->id ,
            'comment'  => $request->comment
        ]);

         return redirect()->route('frontend-video' , ['id' => $video->id , '#comments']);

    }// End of commentUpdate Function
}
