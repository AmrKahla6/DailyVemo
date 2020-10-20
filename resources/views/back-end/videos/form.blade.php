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
<div>
  <lable>Video image</lable>
<input  type="file" name="{{ $input }}">

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
            <lable class="bmd-label-placeholder" style="position: inherit;">Video Status</lable>
            <select name="{{ $input }}"  class="form-control  @error($input) is-invalid @enderror" >
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
            <lable style="position: inherit;" class="bmd-label-placeholder">Video Category</lable>
            <select name="{{ $input }}"  class="form-control  @error($input) is-invalid @enderror" >
                   @foreach ($categories as $category)
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

        <lable class="bmd-label-placeholder" style="position: relative">Skills</lable>
            <select name="{{ $input }}"  class="form-control  @error($input) is-invalid @enderror" multiple style="height: 100px">
                   @foreach ($skills as $skill)

                    <option value="{{ $skill->id }}" {{ in_array($skill->id ,$selectedSkills) ? 'selected' : '' }}>{{ $skill->name }}</option>

                   @endforeach
            </select>

            @error($input)

                <span class="invalid-feedback" role="alert">

                    <strong>{{ $message }}</strong>

                </span>

            @enderror
    </div>

</div>


@php

$input = 'tags[]';

@endphp

<div class="col-md-6">

<div class="form-group bmd-form-group">

    <lable class="bmd-label-placeholder" style="position: relative">Tags</lable>
        <select name="{{ $input }}"  class="form-control  @error($input) is-invalid @enderror" multiple style="height: 100px">
               @foreach ($tags as $tag)

                <option value="{{ $tag->id }}" {{ in_array($tag->id ,$selectedTags) ? 'selected' : '' }}>{{ $tag->name }}</option>

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






