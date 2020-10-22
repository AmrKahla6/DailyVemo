<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use App\Models\Skill;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
    }

    public function category($id)
    {
        $cat = Category::findOrFail($id);
        $videos = Video::where('cat_id' , $id)->orderby('id' , 'desc')->paginate(30);
        return view('front-end.categories.index' , compact('videos' , 'cat'));
    }

    // public function skill($id)
    // {
    //     $skil = Skill::findOrFail($id);
    //     $videos = Video::where('skil_id' , $id)->orderby('id' , 'desc')->paginate(30);
    //     return view('front-end.skills.index' , compact('videos' , 'skil'));

    // }
}
