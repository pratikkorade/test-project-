


<form method="POST" action="forgot-password">
{!! csrf_field() !!}
@if ($message = Session::get('success'))
                    <div class="alert alert-success">
                      <p>
                        {{ $message }}
                      </p>
                    </div>
@endif
@if ($message = Session::get('warning'))
                    <div class="alert alert-warning">
                      <p>
                        {{ $message }}
                      </p>
                    </div>
                  @endif
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="email" class="col-md-4 control-label">E-Mail Address</label>
<div class="col-md-6">
    <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}" required autofocus>

    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
    </div>
</div>
</div>
</div>
    </form>
