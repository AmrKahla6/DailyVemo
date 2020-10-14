@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <lable class="bmd-label-floating">Username</lable>
            <input type="text" name="name" value="{{isset($user) ? $user->name : ""}}" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
      <div class="form-group bmd-form-group">
          <lable class="bmd-label-floating">Email address</lable>
          <input type="email" name="email" value="{{isset($user) ? $user->email : ""}}" class="form-control">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group bmd-form-group">
          <lable class="bmd-label-floating">Password</lable>
          <input type="password" name="password" class="form-control">
      </div>
  </div>
</div>
