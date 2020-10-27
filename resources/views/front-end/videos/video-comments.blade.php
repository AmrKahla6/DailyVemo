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
                            <i class="nc-icon nc-chat-33"><a href="{{ route('front.profile' , ['id' => $comment->user->id , 'slug' => slug($comment->user->name)]) }}">
                                {{ $comment->user->name }}
                            </a></i>
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
                  <br>
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
