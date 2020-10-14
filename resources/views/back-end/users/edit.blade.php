@extends('back-end.layouts.app')

@php
    $moduleName = 'User';
    $pageTitle  = 'Edit ' . $moduleName ;
    $pageDes    = 'Here you can  edit ' . $moduleName;
@endphp

@section('title')
  {{ $pageTitle }}
@endsection
@section('content')
@component('back-end.layouts.header')
@slot('nav_title')
     {{ $pageTitle }}
@endslot

@endcomponent

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="card-title">{{ $pageTitle }}</div>
                <div class="card-category">{{ $pageDes }}</div>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update' , $user->id) }}" method="post">
                    @method('put')
                   @include('back-end.users.form')
                      <button type="submit" class="btn btn-primary pull-right"> Update {{$moduleName}} </button>
                      <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
