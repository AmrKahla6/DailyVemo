@csrf

<div class="row">

    @php

        $input = 'name';

    @endphp

    <div class="col-md-6">

        <div class="form-group bmd-form-group">

            <lable class="bmd-label-floating">Page Name</lable>

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

    $input = 'meta_keywords';

@endphp

<div class="col-md-6">

    <div class="form-group bmd-form-group">

        <lable class="bmd-label-floating">Meta Keywords</lable>

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

$input = 'image';

@endphp

<div class="col-md-6">
<div class="form-group bmd-form-group">
  <lable class="bmd-label-floating">Video image</lable>
<input  type="text" name="{{ $input }}" value="{{isset($row) ? $row->{ $input } : ""}}"

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

    $input = 'youtube';

@endphp

<div class="col-md-6">

    <div class="form-group bmd-form-group">

        <lable class="bmd-label-floating">Youtube URL</lable>

    <input type="url" name="{{ $input }}"

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

    $input = 'published';

@endphp

<div class="col-md-6">

    <div class="form-group bmd-form-group">


        <div class="form-group">
            <select name="{{ $input }}"  class="form-control  @error($input) is-invalid @enderror">
                <option value="" disabled selected>Video Status</option>
                <option value="1" {{isset($row) && $row->{$input} == 1 ?  "selected" : ""}}>published</option>
                <option value="0" {{isset($row) && $row->{$input} == 0 ?  "selected" : ""}}>hidden</option>
         </select>
        </div>


            @error($input)

                <span class="invalid-feedback" role="alert">

                    <strong>{{ $message }}</strong>

                </span>

            @enderror
    </div>

</div>

@php

    $input = 'cat_id';

@endphp

<div class="col-md-6">

    <div class="form-group bmd-form-group">

        <div class="form-group">
            <select name="{{ $input }}"  class="form-control  @error($input) is-invalid @enderror">
                   @foreach ($categories as $category)
                   <option value="" disabled selected>Video Category</option>
                    <option value="{{ $category->id }}" {{isset($row) && $row->{$input} == $category->id ?  "selected" : ""}}>{{ $category->name }}</option>

                   @endforeach
            </select>
        </div>

            @error($input)

                <span class="invalid-feedback" role="alert">

                    <strong>{{ $message }}</strong>

                </span>

            @enderror
    </div>

</div>

@php

$input = 'des';

@endphp

<div class="col-md-12">

  <div class="form-group bmd-form-group">

      <lable class="bmd-label-floating">Page Description</lable>
      <textarea name="{{ $input }}" cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">

               {{ isset($row) ? $row->{ $input } : "" }}

            </textarea>

            @error($input)

                <span class="invalid-feedback" role="alert">

                    <strong>{{ $message }}</strong>

                </span>

           @enderror

  </div>

</div>




@php

    $input = 'meta_des';

 @endphp

  <div class="col-md-12">

      <div class="form-group bmd-form-group">

          <lable class="bmd-label-floating">Meta Description</lable>

          <textarea name="{{ $input }}" id="" cols="30" rows="2"

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

  @php

    $input = 'skills[]';

@endphp

<div class="col-md-6">

    <div class="form-group bmd-form-group">

        <lable>Skills</lable>
            <select name="{{ $input }}"  class="form-control  @error($input) is-invalid @enderror" multiple style="height: 100px">
                   @foreach ($skills as $skill)

                    <option value="{{ $skill->id }}" >{{ $skill->name }}</option>

                   @endforeach
            </select>

            @error($input)

                <span class="invalid-feedback" role="alert">

                    <strong>{{ $message }}</strong>

                </span>

            @enderror
    </div>

</div>
</div>








