@extends('layouts.app')

@section('content')
<div class="section section-buttons">
    <div class="container">
      <div class="title">
        <h2>Latest Videos</h2>
      </div>
      <div class="row">
          @foreach ($videos as $video)
            <div class="col-lg-4">
                @include('front-end.shared.video-card')
            </div>
          @endforeach
      </div>
      <div class="row">
          <div class="col-md-12">
              {{ $videos->links() }}
          </div>
      </div>
    </div>
</div>
@endsection
