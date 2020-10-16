@csrf

<div class="row">

    @php

        $input = 'name';

    @endphp

    <div class="col-md-6">

        <div class="form-group bmd-form-group">

            <lable class="bmd-label-floating">Username</lable>

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
          <lable class="bmd-label-floating">Email address</lable>
      <input type="email" name="{{ $input }}" value="{{isset($row) ? $row->{ $input } : ""}}"

              class="form-control

              @error($input) is-invalid @enderror">

            @error($input)

                <span class="invalid-feedback" role="alert">

                    <strong>{{ $message }}</strong>

                </span>

            @enderror

      </div>

  </div>

  @php

    $input = 'password';

 @endphp

  <div class="col-md-6">

      <div class="form-group bmd-form-group">

          <lable class="bmd-label-floating">Password</lable>

      <input type="password" name="{{ $input }}"

             class="form-control

              @error($input) is-invalid @enderror">

            @error($input)

                <span class="invalid-feedback" role="alert">

                    <strong>{{ $message }}</strong>

                </span>

            @enderror

      </div>

  </div>

</div>
