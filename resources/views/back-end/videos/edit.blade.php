@extends('back-end.layouts.app')



@section('title')

    {{ $pageTitle }}

@endsection

@section('content')

    @component('back-end.layouts.header')

            @slot('nav_title')

                {{ $pageTitle }}

            @endslot

    @endcomponent

    @component('back-end.shared.edit' ,  ['pageTitle' => $pageTitle , 'pageDes' => $pageDes])


                <form action="{{ route($routeName.'.update' , $row) }}" method="post">

                    @method('put')

                    @include('back-end.'.$folderName.'.form')

                    <button type="submit" class="btn btn-primary pull-right"> Update {{$moduleName}} </button>

                    <div class="clearfix"></div>

                </form>

    @endcomponent

@endsection
