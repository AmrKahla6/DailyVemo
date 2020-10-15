<form action="{{route($routeName.'.destroy', $row)}}" method="post">

    @csrf

    @method('delete')

    <button type="submit"

             rel="tooltip"

             title=""

             class="btn btn-danger btn-link btn-sm"

             data-original-title="Remove {{ $sModelName }}">

    <i class="material-icons">close</i>
