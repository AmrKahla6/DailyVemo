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


                <form action="{{ route($routeName.'.update' , $row) }}" method="post" enctype="multipart/form-data">

                    @method('put')

                    @include('back-end.'.$folderName.'.form')

                    <button type="submit" class="btn btn-primary pull-right"> Update {{$moduleName}} </button>

                    <div class="clearfix"></div>

                </form>
        @slot('md4')

        @php
            $url = getYoutubeId($row->youtube)
        @endphp


        @if ($url)

            <iframe width="300"  src="https://www.youtube.com/embed/{{ $url }}" style="margin-bottom:20px " frameborder="0" allowfullscreen></iframe>
        @endif

            <img src="{{ url('uploads/'.$row->image) }}" width="300">
        @endslot
    @endcomponent

    @include('back-end.comments.index')
    @include('back-end.comments.create')

@endsection
