@csrf

<div class="row">

    @php

        $input = 'name';

    @endphp

    <div class="col-md-6">

        <div class="form-group bmd-form-group">

            <lable class="bmd-label-floating">Tag Name</lable>

        <input type="text" name="{{ $input }}"

                value="{{isset($row) ? $row->{$input} : ""}}"

                class="form-control  @error($input) is-invalid @enderror">

                @error($input)

                    <span class="invalid-feedback" role="alert">

                        <strong>{{ $message }}</strong>

                    </span>

                @enderror
        </div>

    </div>






  </div>

</div>
