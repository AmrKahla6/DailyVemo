<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Message;
use App\Models\Comment;
use App\Models\Page;
use App\Models\User;
use App\Http\Requests\FrontEnd\Comments\CommentsRequest;
use App\Http\Requests\FrontEnd\Messages\MessagesRequest;
use App\Http\Requests\FrontEnd\Users\UserRequest;
use Illuminate\Support\Facades\Hash;

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
            'commentUpdate',
            'commentStore',
            'profileUpdate'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $videos          = Video::published()->orderby('id' , 'desc')->paginate(9);
        $videos_counts   = Video::published()->count();
        $comments_counts = Comment::count();
        $tags_counts     = Tag::count();
        return view('welcome' , compact('videos' , 'videos_counts' , 'comments_counts' , 'tags_counts'));
    }// End of Welcome Function

    public function index()
    {
        $videos = Video::published()->orderby('id' , 'desc');
        if(request()->has('search') && request()->get('search') != '')
        {
            $videos = $videos->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $videos =$videos->paginate(30);
        return view('home' , compact('videos'));
    }// End of index Function

    public function category($id)
    {
        $cat = Category::findOrFail($id);
        $videos = Video::published()->where('cat_id' , $id)->orderby('id' , 'desc')->paginate(30);
        return view('front-end.categories.index' , compact('videos' , 'cat'));
    }// End of category Function


    public function video($id)
    {
        $video = Video::published()->with('skills' , 'tags' , 'cat' , 'user' , 'comments.user')->findOrFail($id);
        return view('front-end.videos.index' , compact('video'));
    }// End of video Function

    public function skills($id)
    {
        $skill = Skill::findOrFail($id);
        $videos = Video::published()->whereHas('skills' , function($query) use($id){
            $query->where('skill_id' , $id);
        })->orderby('id' , 'desc')->paginate(30);
        return view('front-end.skills.index' , compact('videos' , 'skill'));
    }// End of skills Function

    public function tags($id)
    {
        $tag = Tag::findOrFail($id);
        $videos = Video::published()->whereHas('tags' , function($query) use($id){
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
        $video = Video::published()->findOrFail($id);

        Comment::create([
            'user_id'  => auth()->user()->id,
            'video_id' => $video->id ,
            'comment'  => $request->comment
        ]);

         return redirect()->route('frontend-video' , ['id' => $video->id , '#comments']);

    }// End of commentUpdate Function

    public function messageStore(MessagesRequest $request)
    {
        Message::create($request->all());
        return redirect(route('frontend.landing'));
    }// End of messageStore Function

    public function page($id , $slug = null)
    {
        $page = Page::findOrFail($id);
        return view('front-end.pages.index' , compact('page'));
    }// End of page Function

    public function profile($id , $slug = null)
    {
        $user = User::findOrFail($id);
        return view('front-end.profile.index' , compact('user'));
    }// End of profile Function

    public function profileUpdate(UserRequest $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $array = [];
        if($request->email != $user->email)
        {
            $email = User::where('email' , $request->email)->first();

            if($email == null)
            {
                $array['email'] = $request->email;
            }
        }

        if($request->name != $user->name)
        {
            $array['name'] = $request->name;
        }

        if($request->password != $user->password)
        {
            $array['password'] = Hash::make($request->password);
        }

        if(!empty($array))
        {
            $user->update($array);
        }

        return redirect(route('front.profile', ['id' => $user->id , 'slug' => slug($user->name)]));
    }// End of profileUpdate Function
}
