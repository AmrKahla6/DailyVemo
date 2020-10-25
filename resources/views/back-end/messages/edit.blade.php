@extends('back-end.layouts.app')



@section('title')

    {{ $pageTitle }}

@endsection
@section('content')
    @component('back-end.layouts.header')
            @slot('nav_title')
                <h5>Show Message</h5>
            @endslot
    @endcomponent
    @component('back-end.shared.edit' ,  ['pageTitle' => 'Show Message' , 'pageDes' =>
                'Here you can replay on message'])
                    @include('back-end.'.$folderName.'.form')
    @endcomponent

@endsection
