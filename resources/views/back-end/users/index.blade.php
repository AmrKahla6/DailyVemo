@extends('back-end.layouts.app')

@php
    $moduleName = 'Users';
    $pageTitle  = 'Control '.$moduleName ;
    $pageDes    = 'Here you can add / edit / update / delete ' . $moduleName;
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
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="card-title ">{{ $pageTitle }}</h4>
                    <p class="card-category"> {{ $pageDes }}</p>
                </div>
                <div class="col-md-4 text-right">
                <a href="{{route('users.create')}}" class="btn btn-white btn-round">
                        Add  {{ $moduleName }}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <tr><th>
                  ID
                </th>
                <th>
                  Name
                </th>
                <th>
                  Email
                </th>
                <th class="text-right">
                  Control
                </th>
              </tr></thead>
              <tbody>
                 @foreach ($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td class="td-actions text-right">
                        <a href="{{route('users.edit', $user->id)}}" type="submit" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit {{ $moduleName }}">
                              <i class="material-icons">edit</i>
                            <div class="ripple-container"></div></a>
                        <form action="{{route('users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove {{ $moduleName }}">
                              <i class="material-icons">close</i>
                            <div class="ripple-container"></div></button>
                        </form>
                          </td>
                    </tr>


                 @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>


@endsection

