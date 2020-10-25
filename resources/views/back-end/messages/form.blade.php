@csrf

<div class="row">

    @php

        $input = 'name';

    @endphp

    <div class="col-md-6">

        <div class="form-group bmd-form-group">

            <lable class="bmd-label-floating"> Name</lable>

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

    @php

    $input = 'email';

@endphp

<div class="col-md-6">

    <div class="form-group bmd-form-group">

        <lable class="bmd-label-floating">Email</lable>

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


  @php

    $input = 'message';

  @endphp

  <div class="col-md-12">

      <div class="form-group bmd-form-group">

          <lable class="bmd-label-floating">Message</lable>
          <textarea name="{{ $input }}" id="" cols="30" rows="10"

                   class="form-control

                   @error($input) is-invalid @enderror">

                   {{ isset($row) ? $row->{ $input } : "" }}

                </textarea>

                @error($input)

                    <span class="invalid-feedback" role="alert">

                        <strong>{{ $message }}</strong>

                    </span>

               @enderror

      </div>

  </div>

</div>

<hr>

<h6>Replay on message</h6>
<br>
<form action="{{ route('message.replay' , $row->id) }}" method="post">
    @csrf
    @php

    $input = 'message';

    @endphp

<div class="col-md-12">

    <div class="form-group bmd-form-group">

        <lable class="bmd-label-floating">Message</lable>
        <textarea name="{{ $input }}" id="" cols="30" rows="10"

                 class="form-control

                 @error($input) is-invalid @enderror">
              </textarea>

              @error($input)

                  <span class="invalid-feedback" role="alert">

                      <strong>{{ $message }}</strong>

                  </span>

             @enderror
    </div>
</div>
    <button type="submit" class="btn btn-primary pull-right"> Replay {{$moduleName}} </button>

    <div class="clearfix"></div>
</form>
