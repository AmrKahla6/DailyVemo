@extends('back-end.layouts.app')

@section('title' , 'Home Page')
@section('content')
@component('back-end.layouts.header')
@slot('nav_title')
     Home Page
@endslot

@endcomponent
    <h1>Home Page</h1>
@endsection

