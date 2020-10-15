@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <lable class="bmd-label-floating">Username</lable>
            <input type="text" name="name" value="{{isset($row) ? $row->name : ""}}" class="form-control  @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div class="col-md-6">
      <div class="form-group bmd-form-group">
          <lable class="bmd-label-floating">Email address</lable>
          <input type="email" name="email" value="{{isset($row) ? $row->email : ""}}" class="form-control  @error('email') is-invalid @enderror">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group bmd-form-group">
          <lable class="bmd-label-floating">Password</lable>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      </div>
  </div>
</div>
