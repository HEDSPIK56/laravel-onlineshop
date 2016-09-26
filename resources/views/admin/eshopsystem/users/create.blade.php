@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') User list :: @parent @endsection

{{-- Content --}}
@section('main')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User list</h1>
    </div>
</div>
@include('errors.list')
<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('admin.system.user.store') }}" method="post" enctype="multipart/form-data" novalidate data-toggle="validator" role="form" id="myForm">
        <div class="row">
            <div class="col-sm-6">
            <div class="row">
                <h3>Account Setting</h3>
              <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" placeholder="email@yourcompany.com" required data-error="Email address is invalid">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9 controls">
                  <input type="password" class="form-control" placeholder="password" name="password" required data-minlength="6" id="inputPassword">
                  <div class="help-block">Minimum of 6 characters</div>
                </div>
                <!-- col-sm-10 --> 
              </div>
              <!-- form-group -->
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-9 controls">
                  <input type="password" class="form-control" data-match="#inputPassword" placeholder="confirm password" name="password_confirmation" data-match-error="Whoops, these don't match">
                  <div class="help-block with-errors"></div>
                </div>
                <!-- col-sm-10 --> 
              </div>
              <!-- form-group -->
            </div>
            <div class="row">
            <div class="form-group">
                <label for="role" class="control-label col-md-3">Role</label>
                <div class="col-md-9">
                    <select class="form-control select2 " id="role" name="role">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}"> {{ $role->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="avatar" class="control-label col-md-3">Avatar</label>
                <div class="col-md-9 col-md-offset-5">
                    <input name="avatar" type="file" id="avatar">
                </div>
            </div>
            </div>
            </div>
            <div class="col-sm-6">
              <h3 class="mgbt-xs-15">Profile Setting</h3>
              <div class="form-group">
                <label class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-9 controls">
                  <input type="text" placeholder="first name" class="form-control" name="first_name" required> 
                </div>
                <!-- col-sm-10 --> 
              </div>
              <!-- form-group -->
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9 controls">
                  <input type="text" placeholder="last name" class="form-control" name="last_name" required>
                </div>
                <!-- col-sm-10 --> 
              </div>
              <!-- form-group -->
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-9 controls">
                  <span class="vd_radio radio-info">
                    <input type="radio" checked="" value="M" id="optionsRadios3" name="sex">
                    <label for="optionsRadios3"> Male </label>
                  </span>
                  <span class="vd_radio  radio-danger"> 
                    
                    <input type="radio" value="F" id="optionsRadios4" name="sex">
                    <label for="optionsRadios4"> Female </label>
                  </span> 
                </div>
                <!-- col-sm-10 --> 
              </div>
              <!-- form-group -->
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Birthday</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control datepicker" name="date_of_birth" required>
                </div>
                <!-- col-sm-10 --> 
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9" >
                  <input type="text" class="form-control" name="address" required>
                </div>
                <!-- col-sm-10 --> 
              </div>
              <!-- form-group -->
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Marital Status</label>
                <div class="col-sm-9 controls">
                      <select class="form-control" name="marital_status">
                        <option value="N">Single</option>
                        <option value="Y">Married</option>
                      </select>
                    
                </div>
                <!-- col-sm-10 --> 
              </div>
              <!-- form-group -->
                                        
              <div class="form-group">
                <label class="col-sm-3 control-label">About</label>
                <div class="col-sm-9 controls">
                      <textarea rows="3" class="form-control" id="editer" name="about" required></textarea>
                    
                </div>
                <!-- col-sm-10 --> 
              </div>
              <!-- form-group -->
              
              <hr>
              <h3 class="mgbt-xs-15">Contact Setting</h3>
              <div class="form-group">
                <label class="col-sm-3 control-label">Mobile Phone</label>
                <div class="col-sm-9 controls">
                  <input type="number" placeholder="mobile phone" class="form-control" name="phone_number">
                </div>
              </div>
              <!-- form-group -->
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Google plus</label>
                <div class="col-sm-9 controls">
                  <input type="url" placeholder="Google plus" class="form-control" name="google_plus_link">
                </div>
                <!-- col-sm-10 --> 
              </div>
              <!-- form-group -->
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Facebook</label>
                <div class="col-sm-9 controls">
                  <input type="url" placeholder="facebook" class="form-control" name="facebook_link">
                  </div> 
              </div>
              <!-- form-group -->
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Twitter</label>
                <div class="col-sm-9 controls">
                 <input type="url" placeholder="twitter" class="form-control" name="twitter_link">
                </div>
              </div>
              <!-- form-group --> 
              
            </div>            
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            </div>
          </div>
        </div>
        </form>
    </div>
</div>
@endsection