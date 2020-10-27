@extends('layouts.app')
@section('title' , $cat->name)
@section('meta-des' , $cat->meta_des)
@section('meta-keywords' , $cat->meta_keywords)
@section('content')
<div class="section section-buttons">
    <div class="container">
      <div class="title">
             <h1>{{ $cat->name }}</h1>
      </div>
      @include('front-end.shared.video-row')
    </div>
</div>
@endsection
