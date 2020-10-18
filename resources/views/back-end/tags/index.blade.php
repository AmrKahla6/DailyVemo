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


@component('back-end.shared.table' , ['pageTitle' => $pageTitle , 'pageDes' => $pageDes])

    @slot('addButton')

        <div class="col-md-4 text-right">

            <a href="{{route($routeName.'.create')}}" class="btn btn-white btn-round">

                    Add  {{ $sModelName }}

                </a>

            </div>

        </div>

    @endslot

    @slot('slot')

        <div class="table-responsive">

            <table class="table">

            <thead class=" text-primary">

                <tr><th>
                ID
                </th>

                <th>
                    Tag Name
                </th>

                <th class="text-right">
                Control
                </th>

            </tr></thead>
            <tbody>
                @foreach ($rows as $row)

                    <tr>
                        <td>
                            {{ $row->id }}
                        </td>

                        <td>
                            {{ $row->name }}
                        </td>

                        <td class="td-actions text-right">

                        @include('back-end.shared.buttons.edit')

                        @include('back-end.shared.buttons.delete')

                            <div class="ripple-container"></div></button>

                        </form>

                        </td>

                    </tr>


                @endforeach

            </tbody>

            </table>

            {!! $rows->links() !!}

        </div>

    @endslot
@endcomponent


@endsection

