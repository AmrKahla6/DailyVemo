@extends('back-end.layouts.app')

@section('title' , 'Home Page')

@section('content')

    @component('back-end.layouts.header')
        @slot('nav_title')
            Home Page
        @endslot
    @endcomponent
    @include('back-end.home-sections.statics')
    @include('back-end.home-sections.latest-comments')

@endsection

