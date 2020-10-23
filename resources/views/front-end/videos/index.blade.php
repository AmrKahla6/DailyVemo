@extends('layouts.app')
@section('title' , $video->name)
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
            <p> <i class="nc-icon nc-user-run">{{ $video->user->name }}</i> </p>

            <p>  <i class="nc-icon nc-watch-time">{{ $video->user->created_at->diffForHumans() }}</i> </p>

            <p> {{ $video->des }} </p>

            <p>
               <a href="{{ route('front.category' , ['id' => $video->cat->id]) }}"> <i class="nc-icon nc-single-copy-04">{{ $video->cat->name }}</i> </p></a>
             </p>

            <p>
                @foreach ($video->tags as $tag)
                    <a href="{{ route('front.tag' , ['id' => $tag->id]) }}">
                        <span class="badge badge-primary">{{ $tag->name }}</span>
                    </a>
                @endforeach
            </p>

            <p>
                @foreach ($video->skills as $skill)
                    <a href="{{ route('front.skill' , ['id' => $skill->id]) }}">
                        <span class="badge badge-success">{{ $skill->name }}</span>
                    </a>
                @endforeach
            </p>
        </div>
      </div>
      <br><br>
      <div class="row" id="comments">
          <div class="col-md-12">
            <div class="card text-left">
                <div class="card-header card-header-rose">
                    @php
                         $comments = $video->comments
                    @endphp
                  <h6>Comments ({{count($comments)}})</h6>
                </div>
                <div class="card-body">

                    @foreach ($comments as $comment)
                        <div class="row">
                            <div class="col-md-8">
                                <span style="color:royalblue">
                                    <i class="nc-icon nc-chat-33">{{ $comment->user->name }}</i>
                                </span>
                            </div>
                            @if (auth()->user())
                                 @if ((auth()->user()->group == 'admin') || (auth()->user()->id == $comment->user->id) )
                            @endif
                                <div class="col-md-4 text-right">
                                    <a href="" onclick="$(this).closest('div').next('div').slideToggle(1000); return false;"
                                      class="btn btn-outline-info btn-round btn-sm">Edit</a>

                                    <a href="" class="btn btn-outline-info btn-round btn-sm">Delete</a>
                                </div>
                                <div style="display: none">
                                   <form action="{{ route('front.commentUpdate' ,  $comment->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="comment" class="form-control" cols="100"  rows="5">{{ $comment->comment }}</textarea>
                                    </div>
                                        <button type="submit" class="btn btn-hover">Edit</button> <br> <br>
                                    </form>
                                </div>
                            @endif
                        </div>
                            <p> {{ $comment->comment }}</p>
                              <small> <i class="nc-icon nc-watch-time">{{$comment->created_at->diffForHumans()}}</i></small>

                            @if (!$loop->last)
                                 <hr>
                            @endif

                    @endforeach
                </div>
              </div>
          </div>
      </div>
      @if (auth()->user())
            <form action="{{ route('front.commentStore' ,  $video->id) }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="">Add Comment</label>
                    <textarea name="comment" class="form-control" cols="100"  rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-hover btn-default">Add Comment</button> <br>
            </form>
      @endif
    </div>
</div>
@endsection
