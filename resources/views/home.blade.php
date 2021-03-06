@extends('layouts.app')

@section('content')
<div class="section section-buttons">
    <div class="container">
      <div class="title">
        <h2>Latest Videos</h2>
        @if (request()->get('search') != '')
        <p style="margin-top: 15px">
            You are search on <b>{{ request()->get('search') }}</b> | <a href="{{ route('home') }}">Reset</a>
        </p>
        @endif
      </div>
      @include('front-end.shared.video-row')
    </div>
</div>
@endsection
