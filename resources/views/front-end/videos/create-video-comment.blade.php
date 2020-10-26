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
