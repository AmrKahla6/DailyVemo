@extends('layouts.app')
@section('title' , $user->name)
@section('content')

<div class="section profile-content" style="margin-top:200px ">
    <div class="container">
      <div class="owner">
        <div class="avatar">
          <img src="{{asset('frontend/assets/img/faces/joe-gardner-2.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
        </div>
        <div class="name">
          <h4 class="title">{{ $user->name }}
            <br>
          </h4>
          <h6 class="description">
              {{ $user->email }}
          </h6>
        </div>
    </div>
    @if (auth()->user() &&  auth()->user()->group = 'admin' || auth()->user()->id == $user->id)
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto text-center">
          <br>
             <btn onclick="$('#profileCard').slideToggle()" class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Edit Profile</btn>
             @include('front-end.profile.profile-edit')
            </div>
          @endif
      </div>
    </div>
  </div>

@endsection
