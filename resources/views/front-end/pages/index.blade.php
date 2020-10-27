@extends('layouts.app')
@section('title' , $page->name)
@section('meta-des' , $page->meta_des)
@section('meta-keywords' , $page->meta_keywords)
@section('content')
<div class="section section-buttons text-center" style="min-height: 530px">
    <div class="container">
      <div class="title">
             <h1>{{ $page->name }}</h1>
      </div>
        <p> {{ $page->des }}</p>
    </div>
</div>
@endsection
