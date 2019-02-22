<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reset Password</div>
                {!! Form::open(['name'=>'password-reset', 'method'=>'POST', 'url'=>'password-reset', 'class'=>'password-reset']) !!}
                <div class="card-body">

                  <div class="form-group">
      {!! Form::label('password', 'Password', ['class'=>'control-label visible-ie8 visible-ie9']) !!}
      {!! Form::password('password', ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off', 'id'=>'register_password', 'placeholder'=>'Password']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('password_confirmation', 'Confirm Password', ['class'=>'control-label visible-ie8 visible-ie9']) !!}
      {!! Form::password('password_confirmation', ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off', 'placeholder'=>'Confirm Password']) !!}
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-primary green btn-block uppercase">Submit</button>
    </div>
    {!! Form::hidden('id', $id) !!}
    {!! Form::hidden('password_reset_code', $password_reset_code) !!}
  {!! Form::close() !!}
  <!-- END :: Password Reset Form -->
</div>
                </div>
            </div>
        </div>
    </div>
</div>
