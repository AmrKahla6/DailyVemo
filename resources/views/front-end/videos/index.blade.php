@extends('layouts.app')
@section('title' , $video->name)
@section('meta-des' , $video->meta_des)
@section('meta-keywords' , $video->meta_keywords)
@section('content')
<div class="section section-buttons">
    <div class="container">
      <div class="title">
             <h1>{{ $video->name }}</h1>
      </div>
      <div class="row">
          <div class="col-md-12">
            @php
                 $url = getYoutubeId($video->youtube)
            @endphp

          @if ($url)
                 <iframe width="100%" height="500px" src="https://www.youtube.com/embed/{{ $url }}"
                        style="margin-bottom:20px " frameborder="0" allowfullscreen></iframe>
          @endif
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <p> <i class="nc-icon nc-user-run">{{ $video->user->name }}</i> </p>
                <p>  <i class="nc-icon nc-watch-time">{{ $video->user->created_at->diffForHumans() }}</i> </p>
                <p> {{ $video->des }} </p>
            </div>


        <div class="col-md-3">
           <h6>Categories</h6>
            <p>
               <a href="{{ route('front.category' , ['id' => $video->cat->id]) }}"> <i class="nc-icon nc-single-copy-04">{{ $video->cat->name }}</i> </p></a>
             </p>
        </div>

           <div class="col-md-3">
               <h6>Tags</h6>
            <p>
                @foreach ($video->tags as $tag)
                    <a href="{{ route('front.tag' , ['id' => $tag->id]) }}">
                        <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                    </a>
                @endforeach
            </p>
           </div>
          <div class="col-md-3">
            <h6>Skills</h6>
            <p>
                @foreach ($video->skills as $skill)
                    <a href="{{ route('front.skill' , ['id' => $skill->id]) }}">
                        <span class="badge badge-pill badge-info">{{ $skill->name }}</span>
                    </a>
                @endforeach
            </p>
          </div>
        </div>
      </div>
      <br><br>
    @include('front-end.videos.video-comments')
    @include('front-end.videos.create-video-comment')
    </div>
</div>
@endsection
